<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Town;
use App\Models\Population;

class GraphController extends Controller
{
    public function index()
    {
        $towns = Town::with(['populationRecords' => function ($query) {
            $query->latest('ryear');
        }])
        ->take(10) 
        ->get();

        $labels = [];
        $populations = [];

        foreach ($towns as $town) {
            $labels[] = $town->tname;
            $populations[] = $town->populationRecords->last()->total ?? 0;
        }

        return view('graph', compact('labels', 'populations'));
    }
}