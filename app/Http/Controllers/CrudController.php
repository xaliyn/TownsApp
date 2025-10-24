<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Town;
use App\Models\County;

class CrudController extends Controller
{
    public function index()
    {
        $towns = Town::with('county')->paginate(10);
        return view('crud', compact('towns'));
    }

    public function create()
    {
        $counties = County::all();
        return view('crud_add', compact('counties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tname' => 'required|string|max:255',
            'countyid' => 'required|integer|exists:counties,id'
        ]);

        Town::create([
            'tname' => $request->tname,
            'countyid' => $request->countyid
        ]);

        return redirect()->route('crud.index')->with('success', 'Town added successfully!');
    }

    public function edit($id)
    {
        $town = Town::findOrFail($id);
        $counties = County::all();
        return view('crud_edit', compact('town', 'counties'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tname' => 'required|string|max:255',
            'countyid' => 'required|integer|exists:counties,id'
        ]);

        $town = Town::findOrFail($id);
        $town->update([
            'tname' => $request->tname,
            'countyid' => $request->countyid
        ]);

        return redirect()->route('crud.index')->with('success', 'Town updated successfully!');
    }

    public function destroy($id)
    {
        $town = Town::findOrFail($id);
        $town->delete();

        return redirect()->route('crud.index')->with('success', 'Town deleted successfully!');
    }
}