<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function showAllArticles(){
        $articles = Article::all();
        return view('pages.mainPage', ['articles'=>$articles]);
    }
    public function addArticle(Request $request){
        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->contentField;
        $article->user_id = auth()->user()->getAuthIdentifier();
        $article->save();
        return redirect()->intended('/');
    }
    public function showArticle(Request $request){
        $article = Article::where('id', $request->articleId)->first();
        $comments = Comment::where('article_id', $request->articleId)->get();
        return view('pages.article', ['article'=>$article, 'comments'=>$comments]);
    }
    public function showArticleUpdate(Request $request){
        $article = Article::where('id', $request->articleId)->first();
        return view('pages.updateArticle', ['article'=>$article]);
    }
    public function editArticle(Request $request){
        $article = Article::where('id', $request->articleId)->first();
        $article->title = $request->title;
        $article->content = $request->contentField;
        $article->save();
        return redirect()->intended('/blog/'.$article->id);
    }
}
