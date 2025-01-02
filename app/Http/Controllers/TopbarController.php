<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Support\Facades\Schema;

class TopbarController extends Controller
{
    public function getPlatforms()
    {
        // Check if the platforms table exists before querying
        $platforms = Schema::hasTable('platforms') ? Platform::all() : collect();

        // Share platforms with all views
        view()->share('platforms', $platforms);
    }
}
