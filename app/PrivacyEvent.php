<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivacyEvent extends Model
{
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    protected $hidden = [''];
}
