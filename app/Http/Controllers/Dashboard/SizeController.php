<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{

    public function index()
    {
        $sizes = Size::all();
        return view('dashboard.sizes.index', compact('sizes'));
    }


    public function create()
    {
        return view('dashboard.sizes.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Size::create($request->all());

        return redirect()->route('sizes.index')
            ->with('success', 'Size created successfully.');
    }

    public function edit(Size $size)
    {
        return view('dashboard.sizes.edit', compact('size'));
    }
    public function update(Request $request, Size $size)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $size->update($request->all());

        return redirect()->route('sizes.index')
            ->with('success', 'Size updated successfully.');
    }


    public function destroy(Size $size)
    {
        $size->delete();

        return redirect()->route('sizes.index')
            ->with('success', 'Size deleted successfully.');
    }
}
