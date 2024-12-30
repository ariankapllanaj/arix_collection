<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Platform;
use App\Models\Generation;

class ItemController extends Controller
{
    public function index()
    {
        // Fetch all items for testing
        $items = Item::paginate(10);

        // Fetch platforms and generations from the database
        $platforms = Platform::all();
        $generations = Generation::all();

        return view('pages.items', compact('items', 'platforms', 'generations'));
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);

        return view('pages.item', compact('item'));
    }
}
