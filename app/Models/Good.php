<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $fillable = ['good_name', 'good_price', 'good_advert'];

    public function adverts()
    {
        return $this->hasOne(Advert::class, 'id', 'good_advert');
    }
}
