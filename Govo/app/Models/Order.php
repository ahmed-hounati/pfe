<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    public function cards()
    {
        return $this->belongsToMany(Card::class, 'order_cards', 'order_id', 'card_id');
    }

}