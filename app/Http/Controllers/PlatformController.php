<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    /**
     * Display the details of a platform along with its generations and categories.
     *
     * @param string $name
     * @return \Illuminate\View\View
     */
    public function showByName($name)
    {
        // Fetch the platform with its generations and categories
        $platform = Platform::with(['generations', 'categories'])->where('platform_name', $name)->firstOrFail();
        // dd($platform->categories);

        // Pass the platform data to the view
        return view('pages.platform', compact('platform'));
    }       
}
