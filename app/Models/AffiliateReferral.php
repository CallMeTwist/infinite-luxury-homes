<?php

namespace App\Models;

use App\Affiliate;
use Illuminate\Database\Eloquent\Model;

class AffiliateReferral extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return mixed
     */
    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class, 'affiliate_id')->withTrashed();
    }

    /**
     * @return mixed
     */
    public function referred()
    {
        return $this->belongsTo(Affiliate::class, 'referred_id')->withTrashed();
    }
}
