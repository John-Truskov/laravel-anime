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

Route::middleware(['auth', 'admin'])->group(function (){
    Route::get('/addArticle', [ArticleController::class, 'showAddArticle']);
    Route::post('/addArticle', [ArticleController::class, 'addArticle']);
    Route::get('/editArticle/{articleId}', [ArticleController::class, 'showArticleUpdate']);
    Route::get('/deleteArticle/{articleId}', [ArticleController::class, 'deleteArticle']);
    Route::post('/editArticle', [ArticleController::class, 'editArticle']);
    Route::get('/admin', [AdminController::class, 'showAdmin']);
    Route::get('/admin/anime', [AdminController::class, 'showAnime']);
    Route::get('/admin/users', [AdminController::class, 'showUsers']);
    Route::get('/admin/comments', [AdminController::class, 'showComments']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/addComment', [CommentController::class, 'addComment']);
});

require __DIR__.'/auth.php';
