<?php

namespace App\Models;

use App\Affiliate;
use Illuminate\Database\Eloquent\Model;

class AffiliateKyc extends Model
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
        return $this->belongsTo(Affiliate::class)->withTrashed();
    }
}
