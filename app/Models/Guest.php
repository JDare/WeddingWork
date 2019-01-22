<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = ['name', 'unknown', 'vegetarian', 'dietary_restrictions', 'party_id'];

    protected $casts = [
        'unknown'   => 'boolean',
        'vegetarian'   => 'boolean',
    ];

    public function party()
    {
        return $this->belongsTo(Party::class);
    }
}
