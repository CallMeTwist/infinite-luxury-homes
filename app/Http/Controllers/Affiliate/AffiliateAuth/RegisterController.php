<?php

namespace App\Http\Controllers\Affiliate\AffiliateAuth;

use App\Affiliate;
use App\Models\BankAccount;
use App\Models\AffiliateReferral;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/affiliate/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('affiliate.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:affiliates',
            'phone' => 'required|numeric|unique:affiliates',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:affiliates',
            'phone' => 'required|numeric|unique:affiliates',
            'referrer' => ['nullable', 'string', 'max:255', 'exists:affiliates,email'],
            'password' => 'required|min:6|confirmed',
        ]);

        try{
            $user = Affiliate::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'code' => generate_unique_uuid()
            ]);

            if($request->referrer) {
                $referrer = Affiliate::where('email', $request->referrer)->first();
            }
            else {
                $referrer = Affiliate::where('email', 'nnambeno@gmail.com')->first();
            }

            AffiliateReferral::create([
                'affiliate_id' => $referrer->id,
                'referred_id' => $user->id,
                'code' => generate_unique_uuid()
            ]);
            $user->update(['referrer_id' => $referrer->id]);

            Auth::login($user);
        }
        catch(\Exception $exception){
            session()->flash('danger', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('success', 'Your affiliate account has been created, please wait for approval and activation from our administrator and further instructions.');
        return redirect()->route('affiliate.dashboard.manage');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('affiliate.auth.register')->withAccounts(BankAccount::all());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('affiliate');
    }
}
