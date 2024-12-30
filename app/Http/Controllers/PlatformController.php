<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    /**
     * Display the details of a platform along with its generations.
     *
     * @param string $name
     * @return \Illuminate\View\View
     */
    public function showByName($name)
    {
        // Fetch the platform and its related generations
        $platform = Platform::with('generations')->where('platform_name', $name)->firstOrFail();

        // Debugging: Uncomment this line to check generations data
        // dd($platform->platform_name);

        // Pass the platform data to the view
        return view('pages.platform', compact('platform'));
    }
}
