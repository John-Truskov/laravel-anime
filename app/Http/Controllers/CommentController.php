<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addComment(Request $request){
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->article_id = $request->articleId;
        $comment->user_id = auth()->user()->getAuthIdentifier();
        $comment->save();
        return redirect()->intended('/anime/'.$request->articleId);
    }
}
