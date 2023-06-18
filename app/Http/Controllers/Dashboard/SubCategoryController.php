<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        // Get all sub_categories
        $subCategories = SubCategory::all();

        // Return view with sub_categories data
        return view('dashboard.sub_categories.index', compact('subCategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.sub_categories.create',compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);

        // Create a new sub_category
        $subCategory = SubCategory::create($validatedData);

        // Redirect to the sub_categories index page with success message
        return redirect()->route('sub_categories.index')->with('success', 'Sub Category created successfully.');
    }
    public function edit($id)
    {
        $sub_category = SubCategory::findOrFail($id);
        $categories = Category::all();

        return view('dashboard.sub_categories.edit', compact('sub_category','categories'));
    }
    public function update(Request $request, SubCategory $sub_category)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);

        // Update the sub_category
        $sub_category->update($validatedData);

        // Redirect to the sub_categories index page with success message
        return redirect()->route('sub_categories.index')->with('success', 'Sub Category updated successfully.');
    }

    public function destroy($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();
        return redirect()->back()->with('success', 'Subcategory deleted successfully.');
    }
}
