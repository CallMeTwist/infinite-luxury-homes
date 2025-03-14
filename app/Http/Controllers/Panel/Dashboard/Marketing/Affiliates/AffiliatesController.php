<?php

namespace App\Http\Controllers\Panel\Dashboard\Marketing\Affiliates;

use App\Affiliate;
use App\Http\Controllers\Controller;
use App\Models\AffiliateReferral;
use App\Models\State;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AffiliatesController extends Controller
{
    /**
     * AffiliatesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->path = 'panel.dashboard.marketing.affiliates.';
        $this->entity = new Affiliate();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return view($this->path.'index')->with([
            'affiliates' => $this->entity->withTrashed()->orderBy('first_name', 'asc')->get()
        ]);
    }

    /**
     * @return mixed
     */
    public function paid()
    {
        return view($this->path.'paid')->with([
            'affiliates' => $this->entity->withTrashed()->orderBy('approved', 'asc')->where('payment_proof', '!=', null)->get()
        ]);
    }

    /**
     * @param $code
     * @return RedirectResponse
     */
    public function view($code)
    {
        try{
            $affiliate = $this->entity->with('clients', 'kyc', 'referrals', 'sales')
                ->withTrashed()->where('code', $code)->first();
            if(!$affiliate){
                session()->flash('warning', 'The affiliate does not exist');
                return redirect()->back();
            }
        }
        catch(Exception $e){
            session()->flash('danger', $e->getMessage());
            return redirect()->back();
        }

        return view($this->path.'view')->withAffiliate($affiliate);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function approve(Request $request)
    {
        $request->validate([
            'affiliate' => 'required|string'
        ]);

        try{
            $affiliate = $this->entity->withTrashed()->where('code', $request->affiliate)->first();
            if(!$affiliate){
                session()->flash('warning', 'The affiliate does not exist');
                return redirect()->back();
            }

            $affiliate->update([
                'approved' => true,
                'code' => 'FP-'.$affiliate->state->alias.'-'.generate_random_numbers(5)
            ]);
        }
        catch(Exception $e){
            session()->flash('danger', $e->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('success', $affiliate->name .' has been approved successfully');
        return redirect()->route('panel.marketing.affiliates.view', $affiliate->code);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function disapprove(Request $request)
    {
        $request->validate([
            'affiliate' => 'required|string'
        ]);

        try{
            $affiliate = $this->entity->withTrashed()->where('code', $request->affiliate)->first();
            if(!$affiliate){
                session()->flash('warning', 'The affiliate does not exist');
                return redirect()->back();
            }

            $referred = Affiliate::where('referred_id', $affiliate->id)->first();
            if($referred){
                $referred->delete();
            }

            $affiliate->forceDelete();
            /** email to be sent */
        }
        catch(Exception $e){
            session()->flash('danger', $e->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('danger', $affiliate->name .' has been deleted successfully');
        return redirect()->route('panel.marketing.affiliates');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function suspend(Request $request)
    {
        $request->validate([
            'affiliate' => 'required|string'
        ]);

        try{
            $affiliate = $this->entity->where('code', $request->affiliate)->first();
            if(!$affiliate){
                session()->flash('warning', 'The affiliate does not exist');
                return redirect()->back();
            }

            $affiliate->delete();
        }
        catch(Exception $e){
            session()->flash('danger', $e->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('warning', $affiliate->name .' has been suspended successfully');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function restore(Request $request)
    {
        $request->validate([
            'affiliate' => 'required|string'
        ]);

        try{
            $affiliate = $this->entity->withTrashed()->where('code', $request->affiliate)->first();
            if(!$affiliate){
                session()->flash('warning', 'The affiliate does not exist');
                return redirect()->back();
            }

            $affiliate->restore();
        }
        catch(Exception $e){
            session()->flash('danger', $e->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('success', $affiliate->name .' has been restored successfully');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $request->validate([
            'affiliate' => 'required|string'
        ]);

        try{
            $affiliate = $this->entity->where('code', $request->affiliate)->first();
            if(!$affiliate){
                session()->flash('warning', 'The affiliate does not exist');
                return redirect()->back();
            }

            $affiliate->forceDelete();
        }
        catch(Exception $e){
            session()->flash('danger', $e->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('danger', $affiliate->name .' has been deleted successfully');
        return redirect()->route('panel.marketing.affiliates');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'affiliate' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'avatar' => 'nullable|image|max:2000',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'gender' => 'nullable|string',
            'address' => 'nullable|string',
            'bank_name' => 'nullable|string',
            'account_number' => 'nullable|string',
            'state' => 'required|string',
        ]);

        try{
            $affiliate = $this->entity->where('code', $request->affiliate)->first();
            if(!$affiliate){
                session()->flash('warning', 'The affiliate does not exist');
                return redirect()->back();
            }

            $state = State::where('key', $request->state)->first();
            if(!$state){
                session()->flash('danger', 'The selected state does not exist');
                return redirect()->back()->withInput($request->all());
            }

            if($request->avatar){
                $imageName = 'avatar-' . time() . '.' . $request->avatar->getClientOriginalExtension();
                $request->avatar->move(public_path('/uploads/affiliates/'), $imageName);
            }

            $affiliate->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'avatar' => $request->avatar ? '/uploads/affiliates/'.$imageName : $affiliate->avatar,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'address' => $request->address,
                'bank_name' => $request->bank_name,
                'account_number' => $request->account_number,
                'code' => $affiliate->state_id !== $state->id ? 'FP-'.$state->alias.'-'.generate_random_numbers(5) : $affiliate->code,
                'state_id' => $state->id
            ]);
        }
        catch(Exception $e){
            session()->flash('danger', $e->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('info', $affiliate->name .' has been updated successfully');
        return redirect()->back();
    }

	/**
     * @param Request $request
     * @return RedirectResponse
     */
    public function register(Request $request)
    {
        $request->validate([
            'referrer' => ['nullable', 'string', 'max:255', 'exists:affiliates,code'],
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'avatar' => 'nullable|image|max:2000',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'gender' => 'nullable|string',
            'address' => 'nullable|string',
            'bank_name' => 'nullable|string',
            'account_number' => 'nullable|string',
            'state' => 'required|string'
        ]);

        try{
            if($request->avatar){
                $imageName = 'avatar-' . time() . '.' . $request->avatar->getClientOriginalExtension();
                $request->avatar->move(public_path('/uploads/affiliates/'), $imageName);
            }

            $state = State::where('key', $request->state)->first();
            if(!$state){
                session()->flash('danger', 'The selected state does not exist');
                return redirect()->back()->withInput($request->all());
            }

            $affiliate = $this->entity->create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'avatar' => $request->avatar ? '/uploads/affiliates/'.$imageName : null,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'address' => $request->address,
                'bank_name' => $request->bank_name,
                'account_number' => $request->account_number,
				'password' => bcrypt('secret'),
                'approved' => true,
                'state_id' => $state->id,
                'code' => 'FP-'.$state->alias.'-'.generate_random_numbers(5)
            ]);

			if($request->referrer) {
                $referrer = Affiliate::where('code', $request->referrer)->first();
                AffiliateReferral::create([
                    'affiliate_id' => $referrer->id,
                    'referred_id' => $affiliate->id,
					'active' => true,
                    'code' => generate_unique_uuid()
                ]);
                $affiliate->update(['referrer_id' => $referrer->id]);
            }
        }
        catch(Exception $e){
            session()->flash('danger', $e->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('info', $affiliate->name .' has been created successfully');
        return redirect()->back();
    }
}
