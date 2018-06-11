<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function goods()
    {
        return $this->hasOne(Good::class, 'id', 'order_good');
    }

    public function states()
    {
        return $this->hasOne(State::class, 'id', 'order_state');
    }
}
