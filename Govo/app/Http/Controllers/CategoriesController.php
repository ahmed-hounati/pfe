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
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'require|unique',
        ]);

        $category = new Category;
        $category->name = $request->name;

        $category->save();
        return redirect()->route('categories.all')->with('success', 'Category created successfully');
    }
    public function edit(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $request->validate([
            'name' => 'require|unique',
        ]);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.all')->with('success', 'Category updated successfully!');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.all')->with('success', 'Category deleted successfully!');
    }
}