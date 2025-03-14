<?php

namespace App\Http\Controllers\Panel\Dashboard\Marketing\Location;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use App\Utilities\ThrowException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * CityController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->path = 'panel.dashboard.marketing.locations.';
        $this->entity = new City();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function save(Request $request): RedirectResponse
    {
        $request->validate([
            'state' => 'required|string',
            'name' => 'required|string',
        ]);

        try{
            $state = State::where('key', $request->state)->first();
            if(!$state){
                session()->flash('danger', 'The selected state does not exist');
                return redirect()->back()->withInput($request->all());
            }

            $city = $this->entity->create([
                'name' => title_case($request->name),
                'state_id' => $state->id,
                'slug' => str_slug($state->key.'_'.$request->name)
            ]);
        }
        catch (\Exception $exception){
            (new ThrowException())->throw($exception, $request);
        }

        session()->flash('success', $city->name .' has been added successfully');
        return redirect()->back();
    }
}
