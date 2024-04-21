<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    public function plat()
    {
        return $this->belongsTo(Plat::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_card', 'card_id', 'order_id');
    }


}
