<?php

namespace App\Http\Controllers\Panel\Dashboard\Marketing\Affiliates;

use App\Http\Controllers\Controller;
use App\Models\AffiliateKyc;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class KYCController extends Controller
{
    /**
     * KYCController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->path = 'panel.dashboard.marketing.affiliates.kyc';
        $this->entity = new AffiliateKyc();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return view($this->path)->with([
            'kycs' => $this->entity->with('affiliate')->orderBy('approved')->get()
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function approve(Request $request)
    {
        $request->validate([
            'kyc' => 'required|string'
        ]);

        try{
            $kyc = $this->entity->with('affiliate')->find($request->kyc);
            if(!$kyc){
                session()->flash('warning', 'The kyc document does not exist');
                return redirect()->back();
            }

            $kyc->update(['approved' => true]);
        }
        catch(Exception $e){
            session()->flash('danger', $e->getMessage());
            return redirect()->back();
        }

        session()->flash('success', $kyc->affiliate->name .' KYC data has been approved successfully');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $request->validate([
            'kyc' => 'required|string'
        ]);

        try{
            $kyc = $this->entity->with('affiliate')->find($request->kyc);
            if(!$kyc){
                session()->flash('warning', 'The kyc document does not exist');
                return redirect()->back();
            }

            @unlink(public_path($kyc->front_document));
            @unlink(public_path($kyc->back_document));

            $kyc->delete();
        }
        catch(Exception $e){
            session()->flash('danger', $e->getMessage());
            return redirect()->back();
        }

        session()->flash('danger', $kyc->affiliate->name .' KYC data has been deleted');
        return redirect()->back();
    }
}
