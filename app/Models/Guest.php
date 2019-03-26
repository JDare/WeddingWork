<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Guest extends Model
{
    protected $fillable = ['name', 'unknown', 'vegetarian', 'dietary_restrictions', 'party_id'];

    protected $casts = [
        'attending'   => 'boolean',
        'unknown'   => 'boolean',
        'vegetarian'   => 'boolean',
    ];

    protected static function boot()
    {
        Guest::saving(function(Guest $guest){
           if ($guest->isDirty(['attending']))
           {
               $guest->attending_updated_at = Carbon::now();
           }
        });
        parent::boot();
    }

    public function party()
    {
        return $this->belongsTo(Party::class);
    }
}
