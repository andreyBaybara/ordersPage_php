<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function goods()
    {
        return $this->hasOne(Good::class, 'id', 'good_id');
    }

    public function states()
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }
}
