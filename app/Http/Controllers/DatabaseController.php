<?php

namespace App\Http\Controllers;

use App\Models\Town;

class DatabaseController extends Controller
{
    public function index()
    {
        $towns = Town::with(['county', 'populationRecords'])->paginate(20);
        return view('database', compact('towns'));
    }
}
