<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'Only JPG, PNG, JPEG, and GIF files are allowed.',
            'image.max' => 'The image size cannot be greater than 2MB.',
        ]);

        $category = new Category($request->only(['name', 'description']));

        // Handle file upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
            $category->image = Storage::url($path);
        }

        $category->save();

        session()->flash('success', 'Category created successfully.');

        // Redirect back to the create page
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($category->image) {
                Storage::delete(str_replace('/storage/', 'public/', $category->image));
            }

            $path = $request->file('image')->store('public/images');
            $category->image = Storage::url($path);
        }

        $category->update($request->only(['name', 'description']));

        session()->flash('success', 'Category updated successfully.');

        // Redirect back to the edit page
        return back();
    }

    public function destroy(Category $category)
    {
        // Delete the image if exists
        if ($category->image) {
            Storage::delete(str_replace('/storage/', 'public/', $category->image));
        }

        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
    public function removeImage($id)
{
    $category = Category::findOrFail($id);

    // Delete the image if exists
    if ($category->image) {
        Storage::delete(str_replace('/storage/', 'public/', $category->image));
        $category->image = null;
        $category->save();
    }

    return redirect()->route('categories.edit', $category->id)->with('success', 'Image removed successfully.');
}

}
