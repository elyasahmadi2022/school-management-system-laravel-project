<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    protected $fillable = [
        'name',
        'registration_number',
        'driver_name',
        'driver_phone',
        'capacity'
    ];

    protected $casts = [
        'capacity' => 'integer'
    ];

    public function transfers(): HasMany
    {
        return $this->hasMany(Transfer::class);
    }
}