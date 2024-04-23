<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $order = new Order(['user_id' => $user_id]);
        $order->save();

        foreach ($cardIdsAsIntegers as $cardId) {
            $order->cards()->attach($cardId, ['status' => 'pending']);
        }

        return redirect()->route('payment');
    }


    public function ticket($id)
    {
        $order = Order::findOrFail($id);
        $cardCount = $order->cards()->count();

        return view('user.ticket', ['order' => $order, 'plats' => $cardCount]);
    }

    public function getOrders()
    {
        $user = Auth::user()->id;

        $orders = Order::with([
            'cards' => function ($query) use ($user) {
                $query->where('user_id', $user)
                    ->select('cards.id', 'user_id', 'plat_id', 'resto_id', 'total', 'quantity', 'order_cards.status');
            }
        ])
            ->whereHas('cards', function ($query) use ($user) {
                $query->where('user_id', $user);
            })
            ->get();


        return view('user.orders', ['orders' => $orders]);
    }

}
