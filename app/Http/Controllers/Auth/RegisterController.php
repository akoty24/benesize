<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register_form()
    {
        return view('auth.register');
    }

    protected function register(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|confirmed|min:5|max:25',
        ]);
        if (request()->has('avatar')) {
            $avatar = request()->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
        }
        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'date_of_birth' =>  $request->dob,
            'image' => "/images/" . $avatarName,
        ]);

        if (!$admin) {
            return redirect()->back()->with('message', 'There was a problem with your registration.');
        }

        auth()->guard('admin')->login($admin);

        return redirect()->route('index')->with('message', 'You are now registered!');
    }

    public function logout()
    {
        auth()->guard('admin')->logout();

        return redirect()->route('login.page');
    }
}
