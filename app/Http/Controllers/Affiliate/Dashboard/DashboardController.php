<?php

namespace App\Http\Controllers\Affiliate\Dashboard;

use App\Affiliate;
use App\Http\Controllers\Controller;
use App\Models\State;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:affiliate');
        $this->path = 'affiliate.dashboard.';
        $this->entity = me();
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        return view($this->path.'index');
    }

    /**
     * @return Factory|View
     */
    public function profile()
    {
        return view($this->path.'profile');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'gender' => 'required|string',
            'address' => 'required|string',
        ]);

        try{
            $email = Affiliate::withTrashed()->where('email', $request->email)->first();
            if(!is_null($email) && me()->id != $email->id){
                session()->flash('warning', 'The selected email is already in use. Please try a new one!');
                return redirect()->back()->withInput($request->all());
            }

            $phone = Affiliate::withTrashed()->where('phone', $request->phone)->first();
            if(!is_null($phone) && me()->id != $phone->id){
                session()->flash('warning', 'The selected phone is already in use. Please try a new one!');
                return redirect()->back()->withInput($request->all());
            }

            me()->update([
                'first_name' => title_case($request->first_name),
                'last_name' => title_case($request->last_name),
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'address' => $request->address
            ]);
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('success', 'Profile details successfully updated!');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function password(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'password' => 'required|min:6|confirmed'
        ]);

        try{
            if(!password_verify($request->old_password, me()->password)) {
                session()->flash('danger', 'Password does not match with your current password!');
                return redirect()->back();
            }

            if(password_verify($request->password, me()->password)){
                session()->flash('info', 'No changes was detected!');
                return redirect()->back();
            }

            me()->update(['password' => bcrypt($request->password)]);
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back();
        }

        session()->flash('success', 'Password has been changed successfully!');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function avatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpg,png|max:2000'
        ]);

        try{
            $imageName = 'avatar-' . time() . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('/uploads/affiliates/'), $imageName);

            me()->update(['avatar' => '/uploads/affiliates/'.$imageName]);
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back();
        }

        session()->flash('success', 'Photo has been updated successfully!');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function subscribe(Request $request)
    {
        $request->validate([
            'proof' => 'required|image|mimes:jpg,png|max:2000',
            'state' => 'required|string'
        ]);

        try{
            $state = State::where('key', $request->state)->first();
            if(!$state){
                session()->flash('danger', 'The selected state does not exist');
                return redirect()->back()->withInput($request->all());
            }

            $imageName = time().'.'.$request->proof->getClientOriginalExtension();
            $request->proof->move(public_path('/uploads/proofs/'), $imageName);

            me()->update([
                'state_id' => $state->id,
                'payment_proof' => '/uploads/proofs/'.$imageName
            ]);
        }
        catch(\Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back();
        }

        session()->flash('success', 'Your payment slip has been uploaded, please wait while we go through it and approve your account.');
        return redirect()->back();
    }
}
