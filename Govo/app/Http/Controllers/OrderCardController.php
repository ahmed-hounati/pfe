<?php

namespace App\Http\Controllers;

use App\Models\OrderCard;
use App\Models\Plat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderCardController extends Controller
{
    public function confirmOrder($id)
    {
        $orderCard = OrderCard::findOrFail($id);

        $orderCard->status = 'confirmed';
        $orderCard->save();

        return redirect()->route('getCommands')->with('success', 'Order Confirmed');
    }
    public function cancelOrder($id)
    {
        $orderCard = OrderCard::findOrFail($id);

        $orderCard->status = 'canceled';
        $orderCard->save();

        return redirect()->route('getCommands')->with('success', 'Order canceled');
    }


    public function getCommands()
    {
        $resto = Auth::user()->id;

        $commands = OrderCard::with('card.user')
            ->join('cards', 'order_cards.card_id', '=', 'cards.id')
            ->where('cards.resto_id', $resto)
            ->where('order_cards.status', 'pending')
            ->select('order_cards.*', 'order_cards.status as order_status')
            ->get();

        return view('resto.commands', ['commands' => $commands]);
    }

    public function allCommands()
    {
        $resto = Auth::user()->id;

        $commands = OrderCard::with('card.user')
            ->join('cards', 'order_cards.card_id', '=', 'cards.id')
            ->where('cards.resto_id', $resto)
            ->select('order_cards.*', 'order_cards.status as order_status')
            ->get();

        return view('resto.allCommands', ['commands' => $commands]);
    }

}
