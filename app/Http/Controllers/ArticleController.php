<?php

namespace App\Http\Controllers;

use App\Models\AnimeImage;
use App\Models\Article;
use App\Models\BindUserRole;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function showAllArticles(){
        $articles = Article::all();
        foreach ($articles as $article){
            $article->date = $this->trickDate($article->created_at, false);
            if(mb_strlen($article->content) > 400)
                $article->content = $this->stripPost($article->content);
        }
        return view('pages.mainPage', ['articles'=>$articles]);
    }
    public function showSearchArticles(Request $request){
        $search = $request->search;
        $articles = Article::whereAny(['title', 'content'], 'LIKE', '%'.$search.'%')->get();
        foreach ($articles as $article){
            $article->date = $this->trickDate($article->created_at, false);
            if(mb_strlen($article->content) > 400)
                $article->content = $this->stripPost($article->content);
        }
        return view('pages.searchPage', ['articles' => $articles, 'search' => $search]);
    }
    public function addArticle(Request $request){
        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->contentField;
        $article->user_id = auth()->user()->getAuthIdentifier();
        $file = $request->file('mainImage');
        $path = $file->store('public/anime_image');
        $article->img = str_replace('public','/storage', $path);
        $article->save();
        $frames = $request->file('frames');
        if(!empty($frames)){
            foreach ($frames as $frame){
                $path = $frame->store('public/anime_frames');
                $animeImage = new AnimeImage();
                $animeImage->anime_id = $article->id;
                $animeImage->img = str_replace('public','/storage', $path);
                $animeImage->save();
            }
        }
        return redirect()->intended('/anime/'.$article->id);
    }
    public function showArticle(Request $request){
        $article = Article::where('id', $request->articleId)->first();
        $article->user = User::where('id', $article->user_id)->first();
        $article->date = $this->trickDate($article->created_at);
        $comments = Comment::where('article_id', $request->articleId)->get();
        foreach ($comments as $comment){
            $comment->user = User::where('id', $comment->user_id)->first();
        }
        $frames = AnimeImage::where('anime_id', $request->articleId)->get();
        $userRole = !empty(auth()->user()->id) ? (BindUserRole::where('user_id', auth()->user()->id)->first()->role_id) : 0;
        return view('pages.article', ['article'=>$article, 'comments'=>$comments, 'frames'=>$frames, 'role'=>$userRole]);
    }
    public function showArticleUpdate(Request $request){
        $article = Article::where('id', $request->articleId)->first();
        return view('pages.updateArticle', ['article'=>$article]);
    }
    public function editArticle(Request $request){
        $article = Article::where('id', $request->articleId)->first();
        $article->title = $request->title;
        $article->content = $request->contentField;
        $file = $request->file('mainImage');
        if(!empty($file)){
            if(!empty($article->img)){
                Storage::delete(str_replace('/storage', 'public', $article->img));
            }
            $path = $file->store('public/anime_image');
            $article->img = str_replace('public','/storage', $path);
        }
        $article->save();
        $frames = $request->file('frames');
        if(!empty($frames)){
            foreach ($frames as $frame){
                $path = $frame->store('public/anime_frames');
                $animeImage = new AnimeImage();
                $animeImage->anime_id = $article->id;
                $animeImage->img = str_replace('public','/storage', $path);
                $animeImage->save();
            }
        }
        return redirect()->intended('/anime/'.$article->id);
    }
    public function randomAnime(){
        $max = Article::count();
        return redirect()->intended('/anime/'.mt_rand(1, $max));
    }

    public function showRSS(){
        $articles = Article::all()->sortByDesc('id');
        $now = date(DATE_RFC822);
        foreach ($articles as $article){
            if(mb_strlen($article->title) > 100)
                $article->title = mb_substr($article->title, 0, 100, 'UTF-8').'...';
            if(mb_strlen($article->content) > 400)
                $article->content = $this->stripPost($article->content);
            $article->user = User::where('id', $article->user_id)->first();
            $article->created_at = $article->created_at->tz('GMT')->toAtomString();
        }
        return response()->view('rss', ['articles'=>$articles, 'now'=>$now])->header('Content-Type', 'text/xml');
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

    private function stripPost($text){
        return substr(strip_tags($text), 0, strpos($text, ' ', 400)).'...';
    }
}
