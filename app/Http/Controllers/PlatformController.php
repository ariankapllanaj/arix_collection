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
        // Fetch the platform with its generations, categories, and category images
        $platform = Platform::with([
            'generations',
            'categories',
            'categoryImages.category'
        ])->where('platform_name', $name)->firstOrFail();

        return view('pages.platform', compact('platform'));
    }

    //Admin
    public function create()
    {
        return view('pages.admin.add_platform');
    }

    public function store(Request $request)
    {
        $request->validate([
            'platform_name' => 'required|string|max:255',
            'background_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        $backgroundImageName = $request->file('background_image')->getClientOriginalName();
        $request->file('background_image')->storeAs('images/platforms', $backgroundImageName, 'public');

        $request->file('background_image')->move(public_path('images/platforms'), $backgroundImageName);

        // Save platform to database
        Platform::create([
            'platform_name' => $request->platform_name,
            'background_image' => $backgroundImageName,
        ]);

        return redirect()->route('dashboard')->with('success', 'Platform added successfully!');
    }
}
