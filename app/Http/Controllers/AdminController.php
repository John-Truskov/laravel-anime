<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\BindUserRole;
use App\Models\Comment;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showAdmin(){
        $countUsers = User::all()->count();
        $countArticles = Article::all()->count();
        $countComments = Comment::all()->count();
        return view('admin.main', [
            'countUsers'=>$countUsers,
            'countArticles'=>$countArticles,
            'countComments'=>$countComments]);
    }
    public function showAnime(){
        $articles = Article::all();
        foreach ($articles as $article){
            $user = User::where('id', $article->user_id)->first();
            $article->user = $user->name;
        }
        return view('admin.anime', ['articles'=>$articles]);
    }
    public function showUsers(){
        $users = User::all();
        foreach ($users as $user){
            $bindUserRole = BindUserRole::where('user_id', $user->id)->first();
            $userRole = UserRole::where('id', $bindUserRole->role_id)->first();
            $user->role = $userRole->role;
            $user->role_id = $bindUserRole->role_id;
        }
        return view('admin.users', ['users'=>$users]);
    }
    public function showComments(){
        $comments = Comment::all();
        foreach ($comments as $comment){
            $user = User::where('id', $comment->user_id)->first();
            $comment->user = $user->name;
        }
        return view('admin.comments', ['comments'=>$comments]);
    }
}
