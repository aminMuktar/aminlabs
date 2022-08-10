<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// function () {
//     return view('home');
// }

Route::get('/', [PagesController::class, 'index']);
Route::resource('/blog',PostsController::class);


// Route::get('/blog', function () {
//     return view('blog');
// });
Route::get('/projects', function () {
    return view('projects');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
