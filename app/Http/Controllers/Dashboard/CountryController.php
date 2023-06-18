<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('dashboard.countries.index', compact('countries'));
    }

    public function create()
    {
        return view('dashboard.countries.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'general_title' => 'required',
            'is_active' => 'required',
            'sort' => 'required',
            'img' => 'required', // Assuming image field in the form is named "image"
            'code_number' => 'required',
        ]);
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('images', 'public'); // Store the image file in the "public/images" directory
            $validatedData['image_path'] = $imagePath; // Save the image file path in the validated data
        }
        // Create the country
        $country = Country::create($validatedData);

        // Redirect to the country index page or any other desired page
        return redirect()->route('countries.index');
    }

    public function show(Country $country)
    {
        return view('dashboard.countries.show', compact('country'));
    }

    public function edit(Country $country)
    {
        return view('dashboard.countries.edit', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'general_title' => 'required',
            'is_active' => 'required',
            'sort' => 'required',
            'img' => 'required',
            'code_number' => 'required',
        ]);

        // Update the country
        $country->update($validatedData);

        // Redirect to the country index page or any other desired page
        return redirect()->route('countries.index');
    }

    public function destroy(Country $country)
    {
        // Delete the country
        $country->delete();

        // Redirect to the country index page or any other desired page
        return redirect()->route('countries.index');
    }
}
