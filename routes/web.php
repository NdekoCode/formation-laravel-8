<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', fn () => view('welcome'))->name('app_home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/posts', [PostsController::class, 'posts'])->name('app_posts');
Route::get('/posts/create', [PostsController::class, 'create'])->name('app_postscreate');
Route::post('/posts/create', [PostsController::class, 'store'])->name('app_poststore');
Route::get('/posts//update/{id}', [PostsController::class, 'update'])->name('app_postupdate');
Route::post('/posts/update/{id}', [PostsController::class, 'store_update'])->name('app_storeupdate');
Route::get('/posts/{id}', [PostsController::class, 'show'])->name('app_postshow');
Route::get('projects', [ProjectsController::class, 'index'])->name('app_projects');
Route::get('contact', [HomeController::class, 'contact'])->name('app_contact');

require __DIR__ . '/auth.php';
