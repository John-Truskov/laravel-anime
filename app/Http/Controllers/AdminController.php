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
    public function showAddUser(){
        $userRoles = UserRole::all();
        return view('admin.addUser', ['roles'=>$userRoles]);
    }
    public function addUser(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = password_hash($request->password, PASSWORD_DEFAULT);
        $user->save();
        $bindUserRole = new BindUserRole();
        $bindUserRole->user_id = $user->id;
        $bindUserRole->role_id = $request->role;
        $bindUserRole->save();
        return redirect()->intended('/admin/users');
    }
    public function showUserUpdate(Request $request){
        $user = User::where('id', $request->userId)->first();
        $bindUserRole = BindUserRole::where('user_id', $user->id)->first();
        $userRole = $bindUserRole->role_id;
        $userRoles = UserRole::all();
        return view('admin.updateUser', ['user'=>$user, 'roles'=>$userRoles, 'userRole'=>$userRole]);
    }
    public function editUser(Request $request){
        $user = User::where('id', $request->userId)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)){
            $user->password = password_hash($request->password, PASSWORD_DEFAULT);
        }
        $user->save();
        $bindUserRole = BindUserRole::where('user_id', $request->userId)->first();
        $bindUserRole->role_id = $request->role;
        $bindUserRole->save();
        return redirect()->intended('/admin/users');
    }
    public function deleteUser(Request $request){
        User::where('id', $request->userId)->delete();
        BindUserRole::where('user_id', $request->userId)->delete();
        Article::where('user_id', $request->userId)->delete();
        Comment::where('user_id', $request->userId)->delete();
        return redirect()->intended('/admin/users');
    }
    public function showCommentUpdate(Request $request){
        $comment = Comment::where('id', $request->commentId)->first();
        $user = User::where('id', $comment->user_id)->first();
        $comment->user = $user->name;
        $article = Article::where('id', $comment->article_id)->first();
        $comment->article = $article->title;
        return view('admin.updateComment', ['comment'=>$comment]);
    }
    public function editComment(Request $request){
        $comment = Comment::where('id', $request->id)->first();
        $comment->comment = $request->comment;
        $comment->save();
        return redirect()->intended('/admin/comments');
    }
    public  function deleteComment(Request $request){
        Comment::where('id', $request->commentId)->delete();
        return redirect()->intended('/admin/comments');
    }
}
