<?php

namespace App\Http\Controllers\Panel\Dashboard\Marketing;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Estate;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EstatesController extends Controller
{
    /**
     * EstatesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->path = 'panel.dashboard.marketing.estates.';
        $this->entity = new Estate();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return view($this->path.'index')->withEstates($this->entity->with('city', 'sales')->get());
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'city' => 'required|string',
            'price' => 'required|string',
            'plots' => 'required|string'
        ]);

        try{
            $city = City::find($request->city);
            if(!$city){
                session()->flash('danger', 'The selected city does not exist');
                return redirect()->back()->withInput($request->all());
            }

            $this->entity->create([
                'name' => $request->name,
                'slug' => str_slug($request->name),
                'city_id' => $city->id,
                'price' => $request->price,
                'plots' => $request->plots,
                'code' => generate_unique_uuid()
            ]);
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('success', 'A new estate has been added successfully!');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'estate' => 'required|string',
            'name' => 'required|string',
            'city' => 'required|string',
            'price' => 'required|string',
            'plots' => 'required|string'
        ]);

        try{
            $estate = $this->entity->where('code', $request->estate)->first();
            if(!$estate){
                session()->flash('danger', 'The selected estate does not exist');
                return redirect()->back()->withInput($request->all());
            }

            $city = City::find($request->city);
            if(!$city){
                session()->flash('danger', 'The selected city does not exist');
                return redirect()->back()->withInput($request->all());
            }

            $estate->update([
                'name' => $request->name,
                'slug' => str_slug($request->name),
                'city_id' => $city->id,
                'price' => $request->price,
                'plots' => $request->plots
            ]);
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('info', 'Estate information has been updated successfully!');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $request->validate([
            'estate' => 'required|string'
        ]);

        try{
            $estate = $this->entity->where('code', $request->estate)->first();
            if(!$estate){
                session()->flash('danger', 'The selected estate does not exist');
                return redirect()->back();
            }

            $estate->delete();
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back();
        }

        session()->flash('danger', 'Estate has been deleted successfully!');
        return redirect()->back();
    }

    /**
     * @param $code
     * @return RedirectResponse
     */
    public function view($code)
    {
        try{
            $estate = $this->entity->with('city', 'sales')->where('code', $code)->first();
            if(!$estate){
                session()->flash('danger', 'The selected estate does not exist');
                return redirect()->back();
            }
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back();
        }

        return view($this->path.'view')->withEstate($estate);
    }
}
