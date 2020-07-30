<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function buatKomentar(Request $request, Post $post)
    {
        $comment = New Comment;
        $comment->comment = $request->comment;
        $comment->user_id = auth()->user()->id;

        $post->comments()->save($comment);

        return back()->withInfo('Komentar telah dikirim');
    }
}
