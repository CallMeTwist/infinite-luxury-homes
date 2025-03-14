<?php

namespace App\Http\Controllers\Affiliate\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AffiliateKyc;
use App\Models\State;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KYCController extends Controller
{
    /**
     * KYCController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:affiliate');
        $this->path = 'affiliate.dashboard.';
        $this->entity = new AffiliateKyc();
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        return view($this->path.'kyc');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'state' => 'required|string',
            'lga' => 'required|string',
            'birthdate' => 'required|date',
            'marital' => 'required|string',
            'front' => 'required|image|mimes:jpg,png|max:2000',
            'back' => 'required|image|mimes:jpg,png|max:2000'
        ]);

        try{
            $state = State::where('key', $request->state)->first();
            if(!$state){
                session()->flash('warning', 'The selected state does not exist');
                return redirect()->back()->withInput($request->all());
            }

            $frontImageName = 'front-' . time() . '.' . $request->front->getClientOriginalExtension();
            $request->front->move(public_path('/uploads/kyc/'.str_replace('-', '', me()->code).'/'), $frontImageName);

            $backImageName = 'avatar-' . time() . '.' . $request->back->getClientOriginalExtension();
            $request->back->move(public_path('/uploads/kyc/'.str_replace('-', '', me()->code).'/'), $backImageName);

            $this->entity->create([
                'affiliate_id' => me()->id,
                'state_of_origin' => $state->name,
                'lga_of_origin' => $request->lga,
                'date_of_birth' => $request->birthdate,
                'marital_status' => $request->marital,
                'front_document' => '/uploads/kyc/'.str_replace('-', '', me()->code).'/'.$frontImageName,
                'back_document' => '/uploads/kyc/'.str_replace('-', '', me()->code).'/'.$backImageName
            ]);
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('success', 'KYC document has been uploaded successfully and awaiting approval!');
        return redirect()->back();
    }
}
