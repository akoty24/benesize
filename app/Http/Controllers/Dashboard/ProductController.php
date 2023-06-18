<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {
        $subcategories=SubCategory::all();
        return view('dashboard.products.create',compact('subcategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'min_price' => 'required|numeric',
            'max_price' => 'required|numeric',
            'price' => 'required|numeric',
            'increase_ratio' => 'required|numeric|min:0',
            'repeat_times' => 'required|numeric|min:0',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'is_new' => 'required|boolean',
            'is_on_sale' => 'required|boolean',
            'is_new_arrival' => 'required|boolean',
            'is_best_seller' => 'required|boolean',
        ]);

        // Create a new product instance
        $product = new Product();
        // Set the values from the request to the product model
        $product->name = $request->name;
        $product->description = $request->description;
        $product->min_price = $request->min_price;
        $product->max_price = $request->max_price;
        $product->increase_ratio = $request->increase_ratio;
        $product->repeat_times = $request->repeat_times;
        $product->price = $request->price;
        $product->sub_category_id = $request->sub_category_id;
        $product->is_new = $request->is_new;
        $product->is_on_sale = $request->is_on_sale;
        $product->is_new_arrival = $request->is_new_arrival;
        $product->is_best_seller = $request->is_best_seller;

        $product->save();
        $product->addMediaFromRequest('image')->usingName($product->name)->toMediaCollection('images');
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $sub_categories = SubCategory::all();
        return view('dashboard.products.edit', compact('product','sub_categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'min_price' => 'required|numeric',
            'max_price' => 'required|numeric',
            'price' => 'required|numeric',
            'increase_ratio' => 'required|numeric|min:0',
            'repeat_times' => 'required|numeric|min:0',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'is_new' => 'required|boolean',
            'is_on_sale' => 'required|boolean',
            'is_new_arrival' => 'required|boolean',
            'is_best_seller' => 'required|boolean',
        ]);

        // Set the updated values from the request to the product model
        $product->name = $request->name;
        $product->description = $request->description;
        $product->min_price = $request->min_price;
        $product->max_price = $request->max_price;
        $product->price = $request->price;
        $product->increase_ratio = $request->increase_ratio;
        $product->repeat_times = $request->repeat_times;
        $product->sub_category_id = $request->sub_category_id;
        $product->is_new = $request->is_new;
        $product->is_on_sale = $request->is_on_sale;
        $product->is_new_arrival = $request->is_new_arrival;
        $product->is_best_seller = $request->is_best_seller;

        $product->save();

        return redirect()->route('products.index');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index');
    }
}
