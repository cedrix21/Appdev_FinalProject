<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use App\Models\GroceryItem;
use App\Models\Category;

class GroceryItemController extends Controller
{
    public function index(Request $request)
    {
        $query = GroceryItem::with('category');

        if ($request->has('category') && $request->category !== '') {
            $query->where('category_id', $request->category);
        }

        if ($request->has('bought') && $request->bought !== '') {
            $query->where('bought', $request->bought == '1');
        }

        $items = $query->get();
        $categories = Category::all(); 
        return view('index', compact('items', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        GroceryItem::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        return redirect('/');
    }

    public function edit($id)
    {
        $item = GroceryItem::findOrFail($id);
        $categories = Category::all();
        return view('edit', compact('item', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $item = GroceryItem::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $item->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
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

    public function clear()
    {
        GroceryItem::truncate();
        return redirect('/')->with('success', 'Grocery list cleared!');
    }

    public function reset()
    {
        GroceryItem::truncate();
        Artisan::call('db:seed', [
            '--class' => 'GroceryItemSeeder'
        ]);
        return redirect('/')->with('success', 'Grocery list reset to default!');
    }
}
