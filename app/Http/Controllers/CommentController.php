<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {
        $comments = Comment::with('user')->latest()->get(); // Fetch all comments with user details
        return redirect()->back();
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Comment::create([
            'user_id' => auth()->id(), // Assuming the user is authenticated
            'title' => $validated['title'],
            'blog_id' =>$request->blog_id,
        ]);
        return redirect()->back();

        // return redirect()->route('user.profile.create')->with('success', 'Comment added successfully!');
    }
    
}
