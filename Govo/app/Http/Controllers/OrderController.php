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

        // Find an existing order for the user, or create a new one if it doesn't exist
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
