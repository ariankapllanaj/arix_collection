<?php

namespace App\Http\Controllers;

use App\Models\Generation;

class GenerationController extends Controller
{
    public function show($slug)
    {
        // Find the generation by its name
        $generation = Generation::where('slug', $slug)->firstOrFail();

        // Pass the generation data to the view
        return view('pages.generation', compact('generation'));
    }
}
