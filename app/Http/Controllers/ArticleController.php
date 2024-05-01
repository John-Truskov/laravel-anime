<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function showAllArticles(){
        $articles = Article::all();
        foreach ($articles as $article){
            $article->date = $this->trickDate($article->created_at, false);
        }
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
        $article->user = User::where('id', $article->user_id)->first();
        $article->date = $this->trickDate($article->created_at);
        $comments = Comment::where('article_id', $request->articleId)->get();
        foreach ($comments as $comment){
            $comment->user = User::where('id', $comment->user_id)->first();
        }
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
    private function trickDate($date, $type = true){
        $month = array(
            "января",
            "февраля",
            "марта",
            "апреля",
            "мая",
            "июня",
            "июля",
            "августа",
            "сентября",
            "октября",
            "ноября",
            "декабря"
        );
        $data = date_parse($date);
        $data['month'] = $month[$data['month'] - 1];
        if($data['minute'] < 10) $data['minute'] = '0'.$data['minute'];
        if($data['second'] < 10) $data['second'] = '0'.$data['second'];
        if($type)
            return $data['day'].' '.$data['month'].' '.$data['year'];
        else
            return $data['day'].' '.$data['month'].' '.$data['year'].' в '.$data['hour'].':'.$data['minute'].':'.$data['second'];
    }
}
