<?php

namespace App\Http\Controllers\Panel\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Inspection;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InspectionsController extends Controller
{
    /**
     * InspectionsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->path = 'panel.dashboard.inspections';
        $this->entity = new Inspection();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return view($this->path)->withInspections($this->entity->all());
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function approve(Request $request)
    {
        $request->validate([
            'inspection' => 'required|string'
        ]);

        try{
            $inspection = $this->entity->find($request->inspection);
            if(!$inspection){
                session()->flash('danger', 'The selected inspection does not exist');
                return redirect()->back();
            }

            $inspection->update(['approved' => true]);
        }
        catch(Exception $exception){
            session()->flash('danger', $exception->getMessage());
            return redirect()->back();
        }

        session()->flash('success', 'Inspection has been approved successfully');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $request->validate([
            'inspection' => 'required|string'
        ]);

        try{
            $inspection = $this->entity->find($request->inspection);
            if(!$inspection){
                session()->flash('danger', 'The selected inspection does not exist');
                return redirect()->back();
            }

            $inspection->delete();
        }
        catch(Exception $exception){
            session()->flash('danger', $exception->getMessage());
            return redirect()->back();
        }

        session()->flash('danger', 'Inspection has been deleted successfully');
        return redirect()->back();
    }
}
