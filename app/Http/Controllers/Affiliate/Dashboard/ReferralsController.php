<?php

namespace App\Http\Controllers\Affiliate\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AffiliateReferral;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class ReferralsController extends Controller
{
    /**
     * ReferralsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:affiliate');
        $this->path = 'affiliate.dashboard.';
        $this->entity = new AffiliateReferral();
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        return view($this->path.'referrals');
    }
}
