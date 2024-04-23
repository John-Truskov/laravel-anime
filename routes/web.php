<?php

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
});
Route::post('/addArticle', function (\Illuminate\Http\Request $request){
   $article = new \App\Models\Article();
   $article->title = $request->title;
   $article->content = $request->contentField;
   $article->user_id = auth()->user()->getAuthIdentifier();
   $article->save();
   return redirect()->intended('/');
});
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
