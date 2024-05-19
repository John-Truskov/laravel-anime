<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ArticleController::class, 'showAllArticles']);
Route::get('/anime/{articleId}', [ArticleController::class, 'showArticle']);
Route::post('/search', [ArticleController::class, 'showSearchArticles']);
Route::get('/random', [ArticleController::class, 'randomAnime']);
Route::get('rss.xml', [ArticleController::class, 'showRSS']);
Route::view('/about', 'pages.about');

Route::middleware(['auth', 'verified', 'admin'])->group(function (){
    Route::get('/addArticle', [ArticleController::class, 'showAddArticle']);
    Route::post('/addArticle', [ArticleController::class, 'addArticle']);
    Route::get('/editArticle/{articleId}', [ArticleController::class, 'showArticleUpdate']);
    Route::get('/deleteArticle/{articleId}', [ArticleController::class, 'deleteArticle']);
    Route::post('/editArticle', [ArticleController::class, 'editArticle']);
    Route::get('/admin', [AdminController::class, 'showAdmin']);
    Route::get('/admin/anime', [AdminController::class, 'showAnime']);
    Route::get('/admin/users', [AdminController::class, 'showUsers']);
    Route::get('/admin/comments', [AdminController::class, 'showComments']);
    Route::get('/addUser', [AdminController::class, 'showAddUser']);
    Route::post('/addUser', [AdminController::class, 'addUser']);
    Route::get('/editUser/{userId}', [AdminController::class, 'showUserUpdate']);
    Route::post('/editUser', [AdminController::class, 'editUser']);
    Route::get('/deleteUser/{userId}', [AdminController::class, 'deleteUser']);
    Route::get('/editComment/{commentId}', [AdminController::class, 'showCommentUpdate']);
    Route::post('/editComment', [AdminController::class, 'editComment']);
    Route::get('/deleteComment/{commentId}', [AdminController::class, 'deleteComment']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/addComment', [CommentController::class, 'addComment']);
    Route::get('/user/{userId}', [ProfileController::class, 'showUserInfo']);
});

require __DIR__.'/auth.php';
