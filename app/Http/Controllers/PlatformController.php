<?php

namespace App\Http\Controllers;

use App\Models\Platform;

class PlatformController extends Controller
{
    public function showByName($name)
    {
        // Fetch the platform by its name
        $platform = Platform::with('items')->where('platform_name', $name)->firstOrFail();

        // Pass the platform data to the view
        return view('pages.platform', compact('platform'));
    }
}
