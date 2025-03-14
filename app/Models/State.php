<?php

namespace App\Models;

use App\Affiliate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class State extends Model
{
    /**
     * @var string
     */
    protected $table = 'states';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return HasMany
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    /**
     * @return HasMany
     */
    public function realtors()
    {
        return $this->hasMany(Affiliate::class)->withTrashed();
    }

    /**
     * @return HasMany
     */
    public function clients()
    {
        return $this->hasMany(Client::class)->withTrashed();
    }

    /**
     * @return HasManyThrough
     */
    public function estates()
    {
        return $this->hasManyThrough(Estate::class, City::class);
    }
}
