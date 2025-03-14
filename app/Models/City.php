<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'cities';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return HasMany
     */
    public function estates()
    {
        return $this->hasMany(Estate::class);
    }

    /**
     * @return mixed
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
