<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // List all categories
    public function index()
    {
        $categories = Category::withCount('jobs')->get();
        return view('admin.categories.index', compact('categories'));
    }

    // Store a new category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name|max:255'
        ]);

        Category::create([
            'name' => $request->name,
            // Str::slug converts "Software Engineering" to "software-engineering"
            'slug' => Str::slug($request->name),
        ]);

        return back()->with('success', 'Category added successfully!');
    }

    // Delete a category
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        
        // Interview Tip: Explain that we check if jobs exist before deleting
        if($category->jobs()->count() > 0) {
            return back()->with('error', 'Cannot delete category with active jobs!');
        }

        $category->delete();
        return back()->with('success', 'Category deleted!');
    }
}