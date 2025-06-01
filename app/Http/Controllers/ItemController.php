<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        // This method can be used to display a list of items
        // For now, it can return a view or JSON response
        return view('items.index');
    }

    public function show($id)
    {
        $item=Item::findOrFail($id);
        $comments=$item->comments()->where('status', 'approved')->get();
        return view('front.items.show', ['item' => $item, 'comments' => $comments]);
    }
}
