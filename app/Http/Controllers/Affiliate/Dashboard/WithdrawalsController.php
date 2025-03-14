<?php

namespace App\Http\Controllers\Affiliate\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AffiliateWithdrawal;
use Exception;
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
        $this->middleware('auth:affiliate');
        $this->path = 'affiliate.dashboard.';
        $this->entity = new AffiliateWithdrawal();
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        return view($this->path.'withdrawals');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function account(Request $request)
    {
        $request->validate([
            'bank_name' => 'required|string',
            'account_number' => 'required|string'
        ]);

        try{
            me()->update(['bank_name' => $request->bank_name, 'account_number' => $request->account_number]);
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('success', 'Account information has been updated successfully');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function send(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric'
        ]);

        try{
            me()->update(['balance' => me()->balance - $request->amount]);
            $this->entity->create([
                'referrer_id' => me()->id,
                'amount' => $request->amount,
                'code' => generate_unique_uuid()
            ]);
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('success', 'Withdrawal request has been sent and funds will be transferred to you upon approval');
        return redirect()->back();
    }
}
