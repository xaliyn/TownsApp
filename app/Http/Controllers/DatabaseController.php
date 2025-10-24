<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\County;
use App\Models\Town;
use App\Models\Population;

class DatabaseController extends Controller
{
    public function index()
    {
        // Load towns with their county + population
        $towns = Town::with(['county', 'population'])->get();
        return view('database', compact('towns'));
    }
}