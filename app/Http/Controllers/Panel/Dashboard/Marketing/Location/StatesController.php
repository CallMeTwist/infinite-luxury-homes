<?php

namespace App\Http\Controllers\Panel\Dashboard\Marketing\Location;

use App\Http\Controllers\Controller;
use App\Models\State;

class StatesController extends Controller
{
    /**
     * StatesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->path = 'panel.dashboard.marketing.locations.';
        $this->entity = new State();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return view($this->path.'index')->withStates($this->entity->withCount('estates', 'cities', 'realtors')->get());
    }
}
