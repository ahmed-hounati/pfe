<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Category;
use App\Models\Plat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlatController extends Controller
{
    public function allPlats()
    {
        $plats = Plat::with('category')->get();
        return view('resto.plats', ['plats' => $plats]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('resto.createPlat', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required|min:5',
            'category_id' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        } else {
            $imageName = '';
        }

        $resto_id = Auth::user()->id;

        $plat = new Plat;
        $plat->name = $request->name;
        $plat->price = $request->price;
        $plat->description = $request->description;
        $plat->category_id = $request->category_id;
        $plat->resto_id = $resto_id;
        $plat->image = $imageName;
        $plat->save();

        return redirect()->route('allPlats')->with('success', 'Plat created successfully');
    }

    public function edit($id)
    {
        $plat = Plat::findOrFail($id);
        $categories = Category::all();
        return view('resto.editPlat', ['plat' => $plat, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required|min:5',
            'category_id' => 'required',
        ]);
        $resto_id = Auth::user()->id;

        $plat = Plat::findOrFail($id);
        $plat->name = $request->name;
        $plat->price = $request->price;
        $plat->description = $request->description;
        $plat->category_id = $request->category_id;
        $plat->resto_id = $resto_id;
        $plat->image = 'image.pnj';
        $plat->save();

        return redirect()->route('allPlats')->with('success', 'Plat Updated successfully');
    }

    public function destroy($id)
    {
        $plat = Plat::findOrFail($id);
        $plat->delete();
        return redirect()->route('allPlats')->with('success', 'Plat deleted successfully');
    }

    public function getPlats()
    {
        $plats = Plat::all();
        $orderCount = Card::where('user_id', Auth::user()->id)->count();
        return view('user.dashboard', ['plats' => $plats, 'orderCount' => $orderCount]);
    }

    public function categoryPlats($id)
    {
        $plats = Plat::All()->where('category_id', $id);
        $orderCount = Card::where('user_id', Auth::user()->id)->count();
        return view('user.dashboard', ['plats' => $plats, 'orderCount' => $orderCount]);
    }

    public function restoPlats($id)
    {
        $plats = Plat::All()->where('resto_id', $id);
        return view('user.dashboard', ['plats' => $plats]);
    }

    public function adminPlats()
    {
        $plats = Plat::All();
        return view('admin.plats', ['plats' => $plats]);
    }
}
