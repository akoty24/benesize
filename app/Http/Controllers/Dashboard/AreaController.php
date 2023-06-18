<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\City;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::all();

        return view('dashboard.areas.index', compact('areas'));
    }

    public function create()
    {
        // Retrieve cities for dropdown
        $cities = City::all();

        return view('dashboard.areas.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'general_title' => 'required',
            'city_id' => 'required',
            'is_active' => 'required',
            'sort' => 'required',
        ]);

        Area::create($request->all());

        return redirect()->route('areas.index')
            ->with('success', 'Area created successfully.');
    }

    public function show(Area $area)
    {
        return view('dashboard.areas.show', compact('area'));
    }

    public function edit(Area $area)
    {
        // Retrieve cities for dropdown
        $cities = City::all();

        return view('dashboard.areas.edit', compact('area', 'cities'));
    }

    public function update(Request $request, Area $area)
    {
        $request->validate([
            'general_title' => 'required',
            'city_id' => 'required',
            'is_active' => 'required',
            'sort' => 'required',
        ]);

        $area->update($request->all());

        return redirect()->route('areas.index')
            ->with('success', 'Area updated successfully.');
    }

    public function destroy(Area $area)
    {
        $area->delete();

        return redirect()->route('areas.index')
            ->with('success', 'Area deleted successfully.');
    }
}
