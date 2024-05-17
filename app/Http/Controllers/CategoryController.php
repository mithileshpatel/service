<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'description' => 'required',
        ]);

        // Create Category
        Category::create($request->all());

        session()->flash('success', 'Category updated successfully.');

        // Redirect back to the edit page
        return redirect()->route('categories.create');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        // Validation
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id . '|max:255',
            'description' => 'required',
        ]);

        // Update Category
        $category->update($request->all());

        session()->flash('success', 'Category updated successfully.');

        // Redirect back to the edit page
        return back();
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
