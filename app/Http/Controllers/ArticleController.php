<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function showAllArticles(){
        $articles = \App\Models\Article::all();
        return view('pages.mainPage', ['articles'=>$articles]);
    }
    public function addArticle(Request $request){
        $article = new \App\Models\Article();
        $article->title = $request->title;
        $article->content = $request->contentField;
        $article->user_id = auth()->user()->getAuthIdentifier();
        $article->save();
        return redirect()->intended('/');
    }
    public function showArticle(Request $request){
        $article = \App\Models\Article::where('id', $request->articleId)->first();
        return view('pages.article', ['article'=>$article]);
    }
}
