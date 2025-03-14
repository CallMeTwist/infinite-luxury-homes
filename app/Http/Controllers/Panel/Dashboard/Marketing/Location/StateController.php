<?php

namespace App\Http\Controllers\Panel\Dashboard\Marketing\Location;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Utilities\ThrowException;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * StateController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->path = 'panel.dashboard.marketing.locations.state.';
        $this->entity = new State();
    }

    /**
     * @param $code
     * @return RedirectResponse
     */
    public function view($code)
    {
        try{
            $state = $this->entity->with('realtors', 'cities', 'estates')->where('key', $code)->first();
            if(!$state){
                session()->flash('danger', 'The selected state does not exist');
                return redirect()->back();
            }
        }
        catch(Exception $exception){
            return (new ThrowException())->throw($exception);
        }

        return view($this->path.'index')->withState($state);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function suspend(Request $request): RedirectResponse
    {
        $request->validate([
            'state' => 'required|string'
        ]);

        try{
            $state = $this->entity->where('code', $request->state)->first();
            if(!$state){
                session()->flash('danger', 'The selected state does not exist');
                return redirect()->back();
            }

            $state->delete();
        }
        catch (\Exception $exception){
            (new ThrowException())->throw($exception, $request);
        }

        session()->flash('warning', $state->name .' has been suspended successfully');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function restore(Request $request): RedirectResponse
    {
        $request->validate([
            'state' => 'required|string'
        ]);

        try{
            $state = $this->entity->withTrashed()->where('code', $request->state)->first();
            if(!$state){
                session()->flash('danger', 'The selected state does not exist');
                return redirect()->back();
            }

            $state->restore();
        }
        catch (\Exception $exception){
            (new ThrowException())->throw($exception, $request);
        }

        session()->flash('success', $state->name .' has been restored successfully');
        return redirect()->back();
    }
}
