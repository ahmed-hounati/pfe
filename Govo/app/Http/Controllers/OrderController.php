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
            'cardInfo' => 'required|array',
            'cardInfo.*.id' => 'required|numeric',
            'cardInfo.*.quantity' => 'required|numeric',
        ]);
        dd($request->cardInfo);
    }

}
