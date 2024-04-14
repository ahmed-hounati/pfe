<?php

namespace App\Http\Controllers;

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

        $resto_id = Auth::user()->id;

        $plat = new Plat;
        $plat->name = $request->name;
        $plat->price = $request->price;
        $plat->description = $request->description;
        $plat->category_id = $request->category_id;
        $plat->resto_id = $resto_id;
        $plat->image = 'image.pnj';
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
}
