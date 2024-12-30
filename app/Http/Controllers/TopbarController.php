<?php

namespace App\Http\Controllers;

use App\Models\Platform;

class TopbarController extends Controller
{
    public function getPlatforms()
    {
        // Fetch all platforms from the database
        $platforms = Platform::all();

        // Share platforms with all views
        view()->share('platforms', $platforms);
    }
}
