<?php

namespace App\Http\Controllers\Panel\Dashboard\Marketing\Clients;

use App\Affiliate;
use App\Models\Client;
use App\Models\Country;
use App\Models\State;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
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
        $this->entity = new Client();
        $this->path = 'panel.dashboard.marketing.clients.';
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return view($this->path.'index')->withClients($this->entity->withTrashed()->latest()->get());
    }

    /**
     * @return Application|Factory|View
     */
    public function register()
    {
        return view($this->path.'register');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
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
            'nok_occupation' => 'required|string',
            'affiliate' => 'nullable|string|exists:affiliates,code'
        ]);

        try{
            $exists = $this->entity->where('email', $request->email)->orWhere('phone', $request->phone)->first();
            if($exists){
                session()->flash('warning', 'The client with the phone number or email address already exists');
                return redirect()->back()->withInput($request->all());
            }

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

            if($request->affiliate){
                $affiliate = Affiliate::where('code', $request->affiliate)->first();
                if(!$affiliate){
                    session()->flash('danger', 'The selected affiliate does not exist');
                    return redirect()->back()->withInput($request->all());
                }
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
                'affiliate_id' => $request->affiliate ? $affiliate->id : null
            ]);
        }
        catch(Exception $e){
            session()->flash('danger', $e->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('success', $client->name .' has been registered successfully');
        return redirect()->route('panel.marketing.clients.view', $client->code);
    }

    /**
     * @param $code
     * @return RedirectResponse
     */
    public function edit($code)
    {
        try{
            $client = $this->entity->withTrashed()->with('country', 'state')->where('code', $code)->first();
            if(!$client){
                session()->flash('warning', 'The client does not exist');
                return redirect()->back();
            }
        }
        catch(Exception $e){
            session()->flash('danger', $e->getMessage());
            return redirect()->back();
        }

        return view($this->path.'edit')->withClient($client);
    }

    /**
     * @param $code
     * @return RedirectResponse
     */
    public function client($code)
    {
        try{
            $client = $this->entity->withTrashed()->with('sales', 'country', 'state')->where('code', $code)->first();
            if(!$client){
                session()->flash('warning', 'The client does not exist');
                return redirect()->back();
            }
        }
        catch(Exception $e){
            session()->flash('danger', $e->getMessage());
            return redirect()->back();
        }

        return view($this->path.'view')->withClient($client);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'client' => 'required|string',
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
            'nok_occupation' => 'required|string',
            'affiliate' => 'nullable|string|exists:affiliates,code'
        ]);

        try{
            $client = $this->entity->where('code', $request->client)->first();
            if(!$client){
                session()->flash('warning', 'The client does not exist');
                return redirect()->back();
            }

            $exists = $this->entity->where('email', $request->email)->orWhere('phone', $request->phone)->first();
            if($exists && $exists->id != $client->id){
                session()->flash('warning', 'The client with the phone number or email address already exists');
                return redirect()->back()->withInput($request->all());
            }

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

            if($request->affiliate){
                $affiliate = Affiliate::where('code', $request->affiliate)->first();
                if(!$affiliate){
                    session()->flash('danger', 'The selected affiliate does not exist');
                    return redirect()->back()->withInput($request->all());
                }
            }

            if($request->avatar){
                @unlink($client->avatar);
                $imageName = 'photo-'.str_slug($request->surname.'-'.$request->first_name.'-'.$request->other_names).'.'.$request->proof->getClientOriginalExtension();
                $request->proof->move(public_path('/uploads/clients/'), $imageName);
            }
            else{
                $imageName = $client->avatar;
            }

            $client->update([
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
                'affiliate_id' => $request->affiliate ? $affiliate->id : null
            ]);
        }
        catch(Exception $e){
            session()->flash('danger', $e->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('info', $client->name .' has been updated successfully');
        return redirect()->route('panel.marketing.clients.view', $client->code);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function suspend(Request $request)
    {
        $request->validate([
            'client' => 'required|string'
        ]);

        try{
            $client = $this->entity->where('code', $request->client)->first();
            if(!$client){
                session()->flash('warning', 'The client does not exist');
                return redirect()->back();
            }

            $client->delete();
        }
        catch(Exception $e){
            session()->flash('danger', $e->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('danger', $client->name .' has been deleted successfully');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function restore(Request $request)
    {
        $request->validate([
            'client' => 'required|string'
        ]);

        try{
            $client = $this->entity->withTrashed()->where('code', $request->client)->first();
            if(!$client){
                session()->flash('warning', 'The client does not exist');
                return redirect()->back();
            }

            $client->restore();
        }
        catch(Exception $e){
            session()->flash('danger', $e->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('success', $client->name .' has been restored successfully');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $request->validate([
            'client' => 'required|string'
        ]);

        try{
            $client = $this->entity->withTrashed()->where('code', $request->client)->first();
            if(!$client){
                session()->flash('warning', 'The client does not exist');
                return redirect()->back();
            }

            @unlink($client->avatar);
            $client->forceDelete();
        }
        catch(Exception $e){
            session()->flash('danger', $e->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('success', $client->name .' has been restored successfully');
        return redirect()->back();
    }
}
