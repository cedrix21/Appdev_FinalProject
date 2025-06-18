<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroceryItem;

class GroceryItemController extends Controller
{
    public function index()
    {
        $items = GroceryItem::all();
        return view('index', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        GroceryItem::create([
            'name' => $request->name,
            'category' => $request->category,
        ]);

        return redirect('/');
    }

    public function edit($id)
    {
        $item = GroceryItem::findOrFail($id);
        return view('edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = GroceryItem::findOrFail($id);
        $item->update([
            'name' => $request->name,
            'category' => $request->category,
        ]);

        return redirect('/');
    }

    public function destroy($id)
    {
        GroceryItem::destroy($id);
        return redirect('/');
    }

    public function toggle($id)
    {
        $item = GroceryItem::findOrFail($id);
        $item->bought = !$item->bought;
        $item->save();

        return redirect('/');
    }
}
