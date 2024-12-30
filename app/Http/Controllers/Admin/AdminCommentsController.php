<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminCommentsController extends Controller
{
    public function index()
    {
        $comments = comment::with('user','idea')->latest()->paginate(5);
        return view('admin.comments.index', compact('comments'));
    }

    public function destroy(comment $comment)
    {
      
        $this->authorize('admin');

        $comment->delete();


        return redirect()->back()->with('success', 'comment deleted');
    }
}
