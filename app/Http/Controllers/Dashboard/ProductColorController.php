<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{
    public function index()
    {

// Get all product_colors
        $productColors = ColorProduct::all();

// Return view with product_colors data
        return view('dashboard.product_colors.index', compact('productColors')); }

    public function create()
    {
        $products = Product::all();
        $colors = Color::all();
        return view('dashboard.product_colors.create',compact('products','colors'));
    }



    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'product_id' => 'required',
            'color_id' => 'required',
        ]);

        $productColor = ColorProduct::create($validatedData);
        $product_name=$productColor->product->name;

        $productColor->addMediaFromRequest('image')->usingName($product_name)->toMediaCollection('images');
        // Redirect to the product_colors index page with success message
        return redirect()->route('product_colors.index')->with('success', 'Product Color created successfully.');
    }



    public function edit($id)
    {

        $productColor = ColorProduct::findOrFail($id);
        $products = Product::all();
        $colors = Color::all();


        return view('dashboard.product_colors.edit', compact('products','productColor','colors'));
    }
    public function update(Request $request, ColorProduct $product_color)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'product_id' => 'required',
            'color_id' => 'required',
        ]);

        // Update the sub_category
        $product_color->update($validatedData);

        // Redirect to the product_colors index page with success message
        return redirect()->route('product_colors.index')->with('success', 'Product Color updated successfully.');
    }

    public function destroy($id)
    {
        $product_color = ColorProduct::findOrFail($id);
        $product_color->delete();
        return redirect()->back()->with('success', 'Product Color deleted successfully.');
    }
}
