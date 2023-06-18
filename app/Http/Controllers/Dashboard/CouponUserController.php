<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\CouponUser;
use App\Models\User;
use Illuminate\Http\Request;

class CouponUserController extends Controller
{
    public function index()
    {
        $couponUsers = CouponUser::all();
        return view('dashboard.coupon_users.index', compact('couponUsers'));
    }

    public function create()
    {
        $users = User::all();
        $coupons = Coupon::all();

        return view('dashboard.coupon_users.create', compact('users', 'coupons'));
    }


    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'coupon_id' => 'required',
            'user_id' => 'required',
        ]);

        // Create the coupon user
        CouponUser::create($validatedData);

        // Redirect to the index page or any other desired page
        return redirect()->route('coupon_users.index');
    }

    public function show(CouponUser $couponUser)
    {
        return view('dashboard.coupon_users.show', compact('couponUser'));
    }

    public function edit(CouponUser $couponUser)
    {
        $users = User::all();
        $coupons = Coupon::all();

        return view('dashboard.coupon_users.edit', compact('couponUser', 'users', 'coupons'));
    }
    public function update(Request $request, CouponUser $couponUser)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'coupon_id' => 'required',
            'user_id' => 'required',
        ]);

        // Update the coupon user
        $couponUser->update($validatedData);

        // Redirect to the index page or any other desired page
        return redirect()->route('coupon_users.index');
    }

    public function destroy(CouponUser $couponUser)
    {
        // Delete the coupon user
        $couponUser->delete();

        // Redirect to the index page or any other desired page
        return redirect()->route('coupon_users.index');
    }


}
