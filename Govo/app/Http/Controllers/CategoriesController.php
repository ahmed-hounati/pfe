<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function getCategories()
    {
        $categories = Category::all();
        return view('categories', ['categories' => $categories]);
    }

    public function AllCategories()
    {
        $categories = Category::all();
        return view('user.categorie', ['categories' => $categories]);
    }
    public function add()
    {
        return view('admin.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        } else {
            $imageName = '';
        }

        $category = new Category;
        $category->name = $request->name;
        $category->image = $imageName;

        $category->save();
        return redirect()->route('admin.dashboard')->with('success', 'Category created successfully');
    }
    public function edit($id)
    {
        $cat = Category::findOrFail($id);
        return view('admin.edit', ['category' => $cat]);
    }
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $request->validate([
            'name' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        } else {
            $imageName = '';
        }
        $category->name = $request->name;
        $category->image = $imageName;
        $category->save();
        return redirect()->route('admin.dashboard')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Category deleted successfully!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $categories = Category::where('name', 'like', "%$query%")
            ->get();

        return response()->json(['categories' => $categories]);
    }
}
