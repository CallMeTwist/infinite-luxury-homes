<?php

namespace App\Http\Controllers\Panel\Dashboard\Marketing\Affiliates;

use App\Http\Controllers\Controller;
use App\Models\AffiliateWithdrawal;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WithdrawalsController extends Controller
{
    /**
     * WithdrawalsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->path = 'panel.dashboard.marketing.affiliates.';
        $this->entity = new AffiliateWithdrawal();
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view($this->path.'withdrawals')->withWithdrawals($this->entity->with('affiliate')->orderBy('approved', 'desc')->get());
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function approve(Request $request)
    {
        $request->validate([
            'withdrawal' => 'required|string'
        ]);

        try{
            $withdrawal = $this->entity->where('code', $request->withdrawal)->first();
            if(!$withdrawal){
                session()->flash('danger', 'The selected withdrawal does not exist');
                return redirect()->back();
            }

            $withdrawal->update(['approved' => true]);
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back();
        }

        session()->flash('success', 'Withdrawal has been approved successfully');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $request->validate([
            'withdrawal' => 'required|string'
        ]);

        try{
            $withdrawal = $this->entity->where('code', $request->withdrawal)->first();
            if(!$withdrawal){
                session()->flash('danger', 'The selected withdrawal does not exist');
                return redirect()->back();
            }

            $withdrawal->delete();
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back();
        }

        session()->flash('danger', 'Withdrawal has been deleted successfully');
        return redirect()->back();
    }
}
