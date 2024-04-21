<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function confirmOrder($cards)
    {
        $cardIdsAsString = explode(',', $cards);
        $cardIdsAsIntegers = array_map('intval', $cardIdsAsString);

        foreach ($cardIdsAsIntegers as $id) {
            $card = Card::findOrFail($id);
            $card->status = 'ordered';
            $card->save();
        }
        $user_id = Auth::user()->id;

        $order = Order::where('user_id', $user_id)->firstOrCreate([
            'user_id' => $user_id,
        ]);

        $order->cards()->syncWithoutDetaching($cardIdsAsIntegers);

        return redirect()->route('payment');
    }



    public function getOrders()
    {
        $user = Auth::user()->id;
        $orders = Order::with('cards')->where('user_id', $user)->get();
        return view('user.orders', ['orders' => $orders]);
    }



}
