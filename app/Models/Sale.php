<?php

namespace App\Models;

use App\Affiliate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    /**
     * @var string
     */
    protected $table = 'sales';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var string[]
     */
    protected $dates = [
        'sold_at'
    ];

    /**
     * @return mixed
     */
    public function client()
    {
        return $this->belongsTo(Client::class)->withTrashed();
    }

    /**
     * @return mixed
     */
    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class)->withTrashed();
    }

    /**
     * @return BelongsTo
     */
    public function estate()
    {
        return $this->belongsTo(Estate::class);
    }
}
