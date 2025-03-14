<?php

namespace App\Models;

use App\Affiliate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AffiliateEarning extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'affiliate_earnings';

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

    /**
     * @return mixed
     */
    public function client()
    {
        return $this->belongsTo(Client::class)->withTrashed();
    }

    /**
     * @return BelongsTo
     */
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
