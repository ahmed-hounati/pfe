<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function confirmOrder(Request $request)
    {
        $request->validate([
            'platIds' => 'required|array',
            'platIds.*' => 'required|integer',
        ]);


        $platIds = $request->input('platIds');
        foreach ($platIds as $platId) {
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->plat_id = $platId;
            $order->save();
        }

        return view('orderDetails');
    }

}
