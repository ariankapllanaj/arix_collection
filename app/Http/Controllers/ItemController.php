<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Platform;
use App\Models\Generation;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $items = Item::query();

        // Filter by Platform
        if ($request->has('platform')) {
            $items->whereHas('platforms', function ($query) use ($request) {
                $query->whereIn('platform_name', (array) $request->input('platform'));
            });
        }

        // Filter by Generation
        if ($request->has('generation')) {
            $items->whereHas('generations', function ($query) use ($request) {
                $query->whereIn('generation_name', (array) $request->input('generation'));
            });
        }

        // Filter by Category
        if ($request->has('category')) {
            $items->whereHas('categories', function ($query) use ($request) {
                $query->whereIn('category_name', (array) $request->input('category'));
            });
        }

        // Filter by Manual (Boolean)
        if ($request->has('manual')) {
            $items->where('manual', $request->input('manual'));
        }

        // Sorting Options
        if ($request->has('sort')) {
            switch ($request->input('sort')) {
                case 'price_asc':
                    $items->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $items->orderBy('price', 'desc');
                    break;
                case 'added_desc':
                    $items->orderBy('created_at', 'desc');
                    break;
                case 'added_asc':
                    $items->orderBy('created_at', 'asc');
                    break;
            }
        }

        // Paginate the results
        $items = $items->paginate(10);

        // Fetch platforms and generations from the database
        $platforms = Platform::all();
        $generations = Generation::all();
        $categories = Category::all();
        
        return view('pages.items', compact('items', 'platforms', 'generations', 'categories'));
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);

        return view('pages.item', compact('item'));
    }
}
