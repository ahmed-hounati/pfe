<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function confirmOrder(Request $request, $cards)
    {
        $cardIdsAsString = explode(',', $cards);
        $cardIdsAsIntegers = array_map('intval', $cardIdsAsString);
        $user_id = Auth::user()->id;
        foreach ($cardIdsAsIntegers as $cardId) {
            $order = new Order;
            $order->user_id = $user_id;
            $order->card_id = $cardId;
            $order->save();
        }
        return redirect()->route('payment');
    }

    public function getOrders()
    {
        $user = Auth::user()->id;
        $orders = Order::where('user_id', $user)->get();
        return view('user.orders', ['orders' => $orders]);
    }

}
