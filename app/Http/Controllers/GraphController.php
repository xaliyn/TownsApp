<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Town;

class GraphController extends Controller
{
    public function index()
    {
        $towns = Town::with(['populationRecords' => function ($query) {
            $query->latest('ryear');
        }])
        ->has('populationRecords')
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
