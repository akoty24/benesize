<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductOffer;
use Illuminate\Http\Request;

class ProductOfferController extends Controller
{


    public function index()
    {
        $productOffers = ProductOffer::all();
        return view('dashboard.product_offers.index', compact('productOffers'));
    }

    public function create()
    {
        $products=Product::all();
        return view('dashboard.product_offers.create',compact('products'));
    }

    public function store(Request $request)
    {
      $request->validate([
            'product_id' => 'required',
            'discount_type' => 'required',
            'discount_value' => 'required',
            'status' => 'required',
        ]);
        $formData = $request->only('product_id', 'discount_type', 'discount_value', 'status');

        $productOffer = new ProductOffer();
        $productOffer->product_id = $formData['product_id'];
        $productOffer->discount_type = $formData['discount_type'];
        $productOffer->discount_value = $formData['discount_value'];
        $productOffer->status = $formData['status'];
        $productOffer->save();
        return redirect()->route('product_offers.index')->with('success', 'Product offer created successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit(ProductOffer $productOffer)
    {
        $products=Product::all();
        return view('dashboard.product_offers.edit', compact('productOffer','products'));
    }


    public function update(Request $request, ProductOffer $productOffer)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'discount_type' => 'required',
            'discount_value' => 'required',
            'status' => 'required',
        ]);

        $productOffer->update($validatedData);

        return redirect()->route('product_offers.index')->with('success', 'Product offer updated successfully.');
    }

    public function destroy(ProductOffer $productOffer)
    {
        $productOffer->delete();

        return redirect()->route('product_offers.index')->with('success', 'Product offer deleted successfully.');
    }

}
