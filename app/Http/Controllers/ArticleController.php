<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function addArticle(Request $request){
        $article = new \App\Models\Article();
        $article->title = $request->title;
        $article->content = $request->contentField;
        $article->user_id = auth()->user()->getAuthIdentifier();
        $article->save();
        return redirect()->intended('/');
    }
}
