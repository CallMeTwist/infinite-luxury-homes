<?php

namespace App\Models;

use App\Affiliate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'clients';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->surname .' '. $this->other_names;
    }

    /**
     * @return HasMany
     */
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

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
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @return mixed
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
