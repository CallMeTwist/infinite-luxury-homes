<?php

namespace App\Http\Controllers\Panel\Dashboard\Settings;

use App\Http\Controllers\Controller;
use App\Models\Legal;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LegalsController extends Controller
{
    /**
     * LegalsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->path = 'panel.dashboard.settings.legals';
        $this->entity = new Legal();
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view($this->path);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function upload(Request $request)
    {
        $request->validate([
            '_file' => 'required|mimes:pdf|max:5000',
            'type' => 'required|string'
        ]);

        try{
            $file = $request->file('_file');

            if($request->type == 'terms') {
                $pdf_media = upload_path().'/legals/'.'.' . $file->getClientOriginalExtension();
                $request->file('_file')->move(public_path(upload_path().'/legals/'), 'fieldphase-terms' . '.' . $file->getClientOriginalExtension());
            }

            if($request->type == 'privacy') {
                $pdf_media = $this->uploadPath.'.' . $file->getClientOriginalExtension();
                $request->file('_file')->move(public_path(upload_path().'/legals/'), 'fieldphase-privacy-='. '.' . $file->getClientOriginalExtension());
            }

            $this->entity->updateOrCreate(
                ['id' => get_legals()->id], [
                    'terms_and_conditions' => $request->type == 'terms' ? $pdf_media : get_legals()->terms_and_conditions,
                    'privacy_policy' => $request->type == 'privacy' ? $pdf_media : get_legals()->privacy_policy
                ]
            );
        }
        catch(Exception $exception){
            session()->flash('danger', $exception->getMessage());
            return redirect()->back();
        }

        session()->flash('success', title_case($request->type).' notice file has been uploaded successfully');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $request->validate([
            'type' => 'required|string'
        ]);

        try{
            if($request->type == 'terms') {
                @unlink(get_legals()->terms_and_conditions);
                get_legals()->update(['terms_and_conditions' => null]);
            }

            if($request->type == 'privacy') {
                @unlink(get_legals()->privacy_policy);
                get_legals()->update(['privacy_policy' => null]);
            }
        }
        catch(Exception $exception){
            session()->flash('danger', $exception->getMessage());
            return redirect()->back();
        }

        session()->flash('danger', title_case($request->type).' notice file has been deleted successfully');
        return redirect()->back();
    }
}
