<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('dashboard.cities.index', compact('cities'));
    }

    public function create()
    {
        // Retrieve any necessary data, such as countries
        $countries = Country::all();

        return view('dashboard.cities.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'general_title' => 'required',
            'country_id' => 'required',
            'is_active' => 'required',
            'sort' => 'required',
        ]);

        City::create($validatedData);

        return redirect()->route('cities.index');
    }

    public function show(City $city)
    {
        return view('dashboard.cities.show', compact('city'));
    }

    public function edit(City $city)
    {
        // Retrieve any necessary data, such as countries
        $countries = Country::all();

        return view('dashboard.cities.edit', compact('city', 'countries'));
    }

    public function update(Request $request, City $city)
    {
        $validatedData = $request->validate([
            'general_title' => 'required',
            'country_id' => 'required',
            'is_active' => 'required',
            'sort' => 'required',
        ]);

        $city->update($validatedData);

        return redirect()->route('cities.index');
    }

    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('cities.index');
    }
}
