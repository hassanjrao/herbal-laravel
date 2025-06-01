<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function index()
    {
        $comments=Comment::with('item')->latest()->get();
        return view('admin.comments.index', compact('comments'));
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back()->withToastSuccess('Comment deleted successfully.');
    }
    public function approve($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->status = 'approved';
        $comment->save();

        return redirect()->back()->withToastSuccess('Comment approved successfully.');
    }
    public function disapprove($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->status = 'disapproved';
        $comment->save();

        return redirect()->back()->withToastSuccess('Comment disapproved successfully.');
    }
}
