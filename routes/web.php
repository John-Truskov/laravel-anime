<?php

use App\Http\Controllers\ArticleController;
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

Route::get('/', function () {
    $articles = \App\Models\Article::all();
    return view('pages.mainPage', ['articles'=>$articles]);
});

Route::get('/dashboard', function () {
    $user = auth()->user();
    return view('dashboard', ['user'=>$user]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/addArticle', function(){
    return view('pages.addArticle');
})->middleware('auth');
Route::post('/addArticle', [ArticleController::class, 'addArticle'])->middleware('auth');
Route::get('/blog/{articleId}', function (\Illuminate\Http\Request $request){
    $article = \App\Models\Article::where('id', $request->articleId)->first();
    return view('pages.article', ['article'=>$article]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
