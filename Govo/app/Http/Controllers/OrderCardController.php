<?php

namespace App\Http\Controllers;

use App\Models\OrderCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderCardController extends Controller
{
    public function confirmOrder($id)
    {
        $orderCard = OrderCard::findOrFail($id);

        $orderCard->status = 'confirmed';
        $orderCard->save();

        return redirect()->route('getCommands')->with('success', 'Order Confirmed');
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


}
