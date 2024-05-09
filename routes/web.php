<?php

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
    Route::view('addArticle', 'pages.addArticle');
    Route::post('/addArticle', [ArticleController::class, 'addArticle']);
    Route::get('/editArticle/{articleId}', [ArticleController::class, 'showArticleUpdate']);
    Route::post('/editArticle', [ArticleController::class, 'editArticle']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/addComment', [CommentController::class, 'addComment']);
});

require __DIR__.'/auth.php';
