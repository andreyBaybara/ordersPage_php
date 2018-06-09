<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    public function adverts()
    {
        return $this->hasOne(Advert::class, 'id', 'good_advert');
    }
}
