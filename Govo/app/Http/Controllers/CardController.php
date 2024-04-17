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

    public function addToCard($id)
    {
        $plat = Plat::findOrFail($id);

        $existingCard = Card::where('plat_id', $plat->id)
            ->where('user_id', Auth::user()->id)
            ->exists();

        if ($existingCard) {
            return redirect()->route('user.dashboard')->with('error', $plat->name . ' is already in your cart');
        }

        $card = new Card;
        $card->plat_id = $plat->id;
        $card->user_id = Auth::user()->id;
        $card->save();


        return redirect()->route('user.dashboard')->with([
            'success' => $plat->name . ' added to cart',
        ]);
    }
    public function getOrderCount()
    {
        $orderCount = Card::where('user_id', Auth::user()->id)->count();
        return response()->json(['orderCount' => $orderCount], Response::HTTP_OK);
    }

    public function cardPlats()
    {
        $plats = Card::where('user_id', auth()->id())
            ->with('plat')
            ->get();

        return response()->json($plats);
    }

    public function delete(Request $request)
    {
        $platIds = $request->input('ids');
        foreach ($platIds as $platId) {
            $card = Card::where('plat_id', $platId)->first();
            if ($card) {
                $card->delete();
            }
        }

        return response()->json(['message' => 'Plats deleted successfully'], Response::HTTP_OK);
    }



}
