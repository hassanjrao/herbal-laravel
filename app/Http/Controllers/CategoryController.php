<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // This method can be used to display a list of categories
        // For now, it can return a view or JSON response
        return view('categories.index');
    }
    public function show($id)
    {
        $category = Category::with('items')->findOrFail($id);
        $groupedItems = [];

        foreach ($category->items as $item) {
            $firstLetter = strtoupper(substr($item->name, 0, 1));

            if (!ctype_alpha($firstLetter)) {
                $firstLetter = '0-9'; // Handle numeric or special characters
            }

            $groupedItems[$firstLetter][] = $item;
        }
        // Sort groups alphabetically
        ksort($groupedItems);
        
        return view('front.categories.show', ['category' => $category, 'groupedItems' => $groupedItems]);
    }
}
