<?php

namespace App\Http\Controllers\Affiliate\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Country;
use App\Models\State;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientsController extends Controller
{
    /**
     * ClientsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:affiliate');
        $this->path = 'affiliate.dashboard.clients.';
        $this->entity = new Client();
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
    public function register()
    {
        return view($this->path.'register');
    }

    public function save(Request $request)
    {
        $request->validate([
            'surname' => 'required|string',
            'first_name' => 'required|string',
            'other_names' => 'required|string',
            'gender' => 'required|string',
            'birthdate' => 'required|date',
            'marital' => 'required|string',
            'address' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpg,png|max:2000',
            'email' => 'nullable|string',
            'phone' => 'required|string',
            'occupation' => 'required|string',
            'country' => 'required|string',
            'state' => 'required|string',
            'lga' => 'required|string',
            'nok_surname' => 'required|string',
            'nok_other_names' => 'required|string',
            'nok_address' => 'required|string',
            'nok_gender' => 'required|string',
            'nok_phone' => 'required|string',
            'nok_occupation' => 'required|string'
        ]);

        try{
            $country = Country::where('iso', $request->country)->first();
            if(!$country){
                session()->flash('danger', 'The selected country does not exist');
                return redirect()->back()->withInput($request->all());
            }

            $state = State::where('key', $request->state)->first();
            if(!$state){
                session()->flash('danger', 'The selected state does not exist');
                return redirect()->back()->withInput($request->all());
            }

            if($request->avatar){
                $imageName = 'photo-'.str_slug($request->surname.'-'.$request->first_name.'-'.$request->other_names).'.'.$request->avatar->getClientOriginalExtension();
                $request->avatar->move(public_path('/uploads/clients/'), $imageName);
            }

            $client = $this->entity->create([
                'surname' => title_case($request->surname),
                'first_name' => title_case($request->first_name),
                'other_names' => title_case($request->other_names),
                'gender' => $request->gender,
                'birthday' => $request->birthdate,
                'marital_status' => $request->marital,
                'address' => $request->address,
                'avatar' => $request->avatar ? '/uploads/clients/'.$imageName : null,
                'email' => strtolower($request->email),
                'phone' => $request->phone,
                'occupation' => $request->occupation,
                'country_id' => $country->id,
                'state_id' => $state->id,
                'lga' => $request->lga,
                'nok_surname' => title_case($request->nok_surname),
                'nok_other_names' => title_case($request->nok_other_names),
                'nok_address' => $request->nok_address,
                'nok_gender' => $request->nok_gender,
                'nok_phone' => $request->nok_phone,
                'nok_occupation' => $request->nok_occupation,
                'code' => 'FPC-'.$state->key.'-'.generate_random_numbers(5),
                'affiliate_id' => me()->id
            ]);
        }
        catch(\Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('success', $client->name. 'account has been created successfully');
        return redirect()->route('affiliate.dashboard.clients.view', $client->code);
    }

    /**
     * @param $code
     * @return RedirectResponse
     */
    public function view($code)
    {
        try{
            $client = me()->clients()->with('sales', 'country', 'state')->where('code', $code)->first();
            if(!$client){
                session()->flash('warning', 'The selected client does not exit in your client list');
                return redirect()->route('affiliate.dashboard.clients.manage');
            }
        }
        catch(\Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back();
        }

        return view($this->path.'view')->withClient($client);
    }
}
