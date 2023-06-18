<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('dashboard.colors.index', compact('colors'));
    }


    public function create()
    {
        return view('dashboard.colors.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'hexa' => 'required',
        ]);

        Color::create($request->all());

        return redirect()->route('colors.index')
            ->with('success', 'Color created successfully.');
    }

    public function edit(Color $color)
    {
        return view('dashboard.colors.edit', compact('color'));
    }
    public function update(Request $request, Color $color)
    {
        $request->validate([
            'name' => 'required',
            'hexa' => 'required',

        ]);

        $color->update($request->all());

        return redirect()->route('colors.index')
            ->with('success', 'Color updated successfully.');
    }


    public function destroy(Color $color)
    {
        $color->delete();

        return redirect()->route('colors.index')
            ->with('success', 'Color deleted successfully.');
    }
}
