<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $itemId)
    {
        $request->validate([
            'name' => 'required|string|max:1000',
            'email' => 'required|email|max:1000',
            'comment' => 'required|string|max:1000',
        ]);

        $item= \App\Models\Item::findOrFail($itemId);

        Comment::create([
            'item_id' => $itemId,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->withToastSuccess('Comment submitted successfully.');
    }
}
