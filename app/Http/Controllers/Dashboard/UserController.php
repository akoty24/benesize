<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $areas = Area::all();
        return view('dashboard.users.create', compact('countries', 'cities', 'areas'));
    }


    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'address' => 'required',
            'lat' => 'required',
            'lang' => 'required',
            'image' => 'required',
            'is_active' => 'required',
            'activation_code' => 'required',
            'is_registered' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'area_id' => 'required',
        ]);

        // Create the user
        $user = User::create($validatedData);

        // Redirect to the user's profile or any other desired page
        return redirect()->route('users.index');
    }


    public function show(User $user)
    {
        return view('dashboard.users.show', compact('user'));
    }



    public function edit(User $user)
    {
        $countries = Country::all();
        $cities = City::all();
        $areas = Area::all();
        return view('dashboard.users.edit', compact('user', 'countries', 'cities', 'areas'));
    }


    public function update(Request $request, User $user)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'required',
            'address' => 'required',
            'lat' => 'required',
            'lang' => 'required',
            'image' => 'image',
            'is_active' => 'required',
            'activation_code' => 'required',
            'is_registered' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'area_id' => 'required',
        ]);

        // Update the user
        $user->update($validatedData);

        // Redirect to the user's profile or any other desired page
        return redirect()->route('users.show', $user->id);
    }

    public function destroy(User $user)
    {
        // Delete the user
        $user->delete();

        // Redirect to the user index page or any other desired page
        return redirect()->route('users.index');
    }


    public function getCities(Request $request)
    {
        $countryId = $request->input('country_id');
        $cities = City::where('country_id', $countryId)->get();

        return response()->json([
            'cities' => $cities
        ]);
    }

    public function getAreas(Request $request)
    {
        $cityId = $request->input('city_id');
        $areas = Area::where('city_id', $cityId)->get();

        return response()->json([
            'areas' => $areas
        ]);
    }

}
