<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $fillable = ['name', 'price', 'advert_id'];

    public function adverts()
    {
        return $this->hasOne(Advert::class, 'id', 'advert_id');
    }
}
