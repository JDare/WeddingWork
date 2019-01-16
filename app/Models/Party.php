<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Party extends Model
{
    protected $fillable = ['name', 'email', 'comment'];

    /**
     * Boot the Model.
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($instance) {
            $instance->uuid = (string) Str::uuid();
        });
    }

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }
}
