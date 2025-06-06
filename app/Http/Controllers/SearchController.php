<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');

        $items = Item::with('tags')
            ->where('name', 'like', "%$query%")
            ->orWhereRaw("LOWER(REPLACE(REGEXP_REPLACE(description, '<[^>]*>', ''), '&nbsp;', '')) LIKE ?", ["%" . strtolower($query) . "%"])
            ->orWhereHas('tags', function ($q) use ($query) {
                $q->where('name', 'like', "%$query%");
            })
            ->paginate(20)
            ->appends(['q' => $query]);

        return view('front.search.index', compact('items', 'query'));
    }
}
