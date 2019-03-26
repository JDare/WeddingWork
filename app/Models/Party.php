<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Party extends Model
{
    protected $fillable = ['name', 'email', 'comment'];

    public function canSendEmail()
    {
        return (count($this->getEmailsForSending()) > 0);
    }

    /**
     * @return array
     */
    public function getEmailsForSending()
    {
        if (!$this->email)
            return [];

        $emails = [];
        if (strstr($this->email, ',') !== 0)
        {
            $emails = array_map('trim', explode(',', $this->email));
        }else{
            if (filter_var($this->email, FILTER_VALIDATE_EMAIL))
            {
                $emails = [$this->email];
            }
        }
        return $emails;
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

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
