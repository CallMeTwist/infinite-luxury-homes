<?php

namespace App\Http\Controllers\Panel\Dashboard\Marketing\Sales;

use App\Affiliate;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Sale;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * SalesController constructor.
     */
    public function __construct()
    {
        $this->entity = new Sale();
        $this->path = 'panel.dashboard.marketing.sales.';
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return view($this->path.'index')->withSales(
            $this->entity->with('estate', 'client', 'affiliate')->get()
        );
    }

    /**
     * @param $code
     * @return RedirectResponse
     */
    public function receipt($code)
    {
        try{
            $sale = $this->entity->with(['client', 'estate'])->whereCode($code)->first();
            if(!$sale){
                session()->flash('warning', 'The selected receipt does not exist');
                return redirect()->back();
            }
        }
        catch(Exception $e){
            session()->flash('danger', $e->getMessage());
            return redirect()->back();
        }

        return view($this->path.'receipt')->withSale($sale);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function sold(Request $request)
    {
        $request->validate([
            'estate' => 'required|string|exists:properties,code',
            'client' => 'required|string|exists:clients,code',
            'affiliate' => 'nullable|string|exists:referrers,code',
            'amount' => 'required',
            'balance' => 'required',
            'payment' => 'required',
            'comment' => 'nullable',
            'sold_at' => 'required',
        ]);

        try{
            $property = $this->entity->where('code', $request->property)->first();
            if(!$property){
                session()->flash('warning', 'The selected property does not exist');
                return redirect()->back()->withInput($request->all());
            }

            $client = Client::with('affiliate')->where('code', $request->client)->first();
            if(!$client){
                session()->flash('warning', 'The client does not exist');
                return redirect()->back()->withInput($request->all());
            }

            $sale = Sale::create([
                'client_id' => $client->id,
                'property_id' => $property->id,
                'referrer_id' => $client->referrer_id,
                'amount' => $request->amount,
                'balance' => $request->balance,
                'payment_mode' => $request->payment,
                'completed' => $request->balance > 0,
                'comments' => $request->comment,
                'sold_at' => $request->sold_at,
                'code' => 'BGP'.generate_random_numbers(7)
            ]);

            $property->update([
                'client_id' => $client->id,
                'sold' => true,
                'sale_id' => $sale->id
            ]);

            if($client->referrer_id){
                $client->referrer->update(['balance' => $client->referrer->balance + percentage($client->referrer->plan->first_gen_percent, $request->amount)]);

                if($client->referrer->referrer_id){
                    $upline = Affiliate::with('plan')->find($client->referrer->referrer_id);
                    if($upline) {
                        $upline->update(['balance' => $upline->balance + percentage($upline->plan->second_gen_percent, $request->amount)]);
                    }

                    $referral = Affiliate::where('referred_id', $client->referrer->id)->where('referrer_id', $upline->id)->first();
                    if($referral){
                        $referral->update(['active' => true]);
                    }
                }

                Referral::create([
                    'client_id' => $client->id,
                    'property_id' => $property->id,
                    'referrer_id' => $client->referrer_id,
                    'amount_earned' => percentage($client->referrer->plan->first_gen_percent, $request->amount),
                    'code' => generate_unique_uuid()
                ]);
            }
        }
        catch(Exception $e){
            session()->flash('danger', $e->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('success', 'Property has been marked as sold successfully');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function unsold(Request $request)
    {
        $request->validate([
            'property' => 'required|string|exists:properties,code'
        ]);

        try{
            $property = $this->entity->with(['client'])->where('code', $request->property)->first();
            if(!$property){
                session()->flash('warning', 'The selected property does not exist');
                return redirect()->back();
            }

            $property->client()->update(['property_id' => null]);
            $property->update(['client_id' => null, 'sold' => false]);
        }
        catch(Exception $e){
            session()->flash('danger', $e->getMessage());
            return redirect()->back();
        }

        session()->flash('warning', 'Property has been marked as unsold successfully');
        return redirect()->back();
    }
}
