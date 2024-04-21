<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Plat;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CardController extends Controller
{


    public function getCommands()
    {
        $commands = Card::join('users', 'cards.user_id', '=', 'users.id')
            ->join('plats', 'cards.plat_id', '=', 'plats.id')
            ->where('cards.validation', 0)
            ->select('cards.*', 'users.*', 'plats.*')
            ->get();

        return view('resto.commands', ['commands' => $commands]);
    }

    public function acceptCommand($id)
    {
        $command = Card::findOrFail($id);
        $command->validation = 1;
        $command->save();

        return redirect()->route('getCommands')->with('success', 'Command accepted');
    }

    public function addToCard(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|int'
        ]);
        $plat = Plat::findOrFail($id);

        $existingCard = Card::where('plat_id', $plat->id)->where('status', 'waiting')
            ->where('user_id', Auth::user()->id)
            ->exists();

        $total = 0;

        $total = $request->quantity * $plat->price;

        if ($existingCard) {
            return redirect()->route('user.dashboard')->with('error', $plat->name . ' is already in your cart');
        }

        $card = new Card;
        $card->plat_id = $plat->id;
        $card->user_id = Auth::user()->id;
        $card->quantity = $request->quantity;
        $card->total = $total;
        $card->save();


        return redirect()->route('user.dashboard')->with([
            'success' => $plat->name . ' added to cart',
        ]);
    }
    public function getOrderCount()
    {
        $orderCount = Card::where('user_id', Auth::user()->id)->where('status', 'waiting')->count();
        return response()->json(['orderCount' => $orderCount], Response::HTTP_OK);
    }


    public function delete($id)
    {
        $card = Card::findOrFail($id);
        if ($card) {
            $card->delete();
        }


        return redirect()->route('card')->with('success', 'plat removed from card');
    }


    public function getCard()
    {
        $cards = Card::where('user_id', auth()->id())
            ->where('status', 'waiting')
            ->with('plat')
            ->get();
        $total = 0;
        foreach ($cards as $card) {
            $price = $card->plat->price * $card->quantity;
            $total += $price;
        }
        return view('user.card', ['cards' => $cards, 'total' => $total]);
    }


    public function plus($id)
    {
        $card = Card::findOrFail($id);
        $card->quantity += 1;
        $card->total = $card->plat->price * $card->quantity;
        $card->save();
        $total = $this->calculateTotal();

        return response()->json(['total' => $total, 'quantity' => $card->quantity, 'plat_price' => $card->plat->price]);
    }

    public function minus($id)
    {
        $card = Card::findOrFail($id);
        if ($card->quantity > 1) {
            $card->quantity -= 1;
            $card->total = $card->plat->price * $card->quantity;
            $card->save();
        }
        $total = $this->calculateTotal();

        return response()->json(['total' => $total, 'quantity' => $card->quantity, 'plat_price' => $card->plat->price]);
    }



    private function calculateTotal()
    {
        $cards = Card::where('user_id', auth()->id())
            ->with('plat')
            ->get();

        $total = 0;
        foreach ($cards as $card) {
            $price = $card->plat->price * $card->quantity;
            $total += $price;
        }

        return $total;
    }

    public function getCardTotal($id)
    {
        $card = Card::findOrFail($id);
        return response()->json(['total' => $card->total]);
    }
}