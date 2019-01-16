<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = ['name', 'vegetarian', 'dietary_restrictions'];

    public function party()
    {
        return $this->belongsTo(Party::class);
    }
}
