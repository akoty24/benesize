<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        return view('dashboard.coupons.index', compact('coupons'));
    }

    public function create()
    {
        return view('dashboard.coupons.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'code' => 'required|unique:coupons',
            'is_active' => 'required',
            'discount' => 'required',
            'type_discount' => 'required',
            'min_price' => 'required',
            'limit' => 'required',
            'limit_user' => 'required',
            'use' => 'required',
            'end_date' => 'required',
        ]);

        $coupon = Coupon::create($validatedData);

        return redirect()->route('coupons.index')->with('success', 'Coupon created successfully');
    }

    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('dashboard.coupons.edit', compact('coupon'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'code' => 'required|unique:coupons,code,' . $id,
            'is_active' => 'required',
            'discount' => 'required',
            'type_discount' => 'required',
            'min_price' => 'required',
            'limit' => 'required',
            'limit_user' => 'required',
            'use' => 'required',
            'end_date' => 'required',
        ]);

        $coupon = Coupon::findOrFail($id);
        $coupon->update($validatedData);

        return redirect()->route('coupons.index')->with('success', 'Coupon updated successfully');
    }

    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();

        return redirect()->route('coupons.index')->with('success', 'Coupon deleted successfully');
    }
}
