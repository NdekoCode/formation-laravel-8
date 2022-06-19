<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\Blog\PostsController;
use App\Http\Controllers\DonationController;

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

// Un groupe de groupe qui requierent une authentification
Route::middleware(['auth'])->group(function () {

    Route::get('/posts/create', [PostsController::class, 'create'])->name('app_postscreate');
    Route::post('/posts/create', [PostsController::class, 'store'])->name('app_poststore');
    Route::get('/posts/update/{id}', [PostsController::class, 'update'])->name('app_postupdate');
    Route::post('/posts/update/{id}', [PostsController::class, 'store_update'])->name('app_storeupdate');
    Route::post('/posts/delete/{id}', [PostsController::class, 'delete'])->name('app_deletepost');
});

Route::get('/posts/{id}', [PostsController::class, 'show'])->name('app_postshow');
Route::get('projects', [ProjectsController::class, 'index'])->name('app_projects');
Route::get('videos', [PostsController::class, 'register']);
Route::get('contact', [HomeController::class, 'contact'])->name('app_contact');
Route::get('report', [ReportController::class, 'report'])->name('app_report');

Route::resource('donations', DonationController::class);

Route::group(['middleware' => 'auth', 'prefix' => 'evenement'], function () {

    Route::resource('events', 'App\Http\Controllers\EventsController');
});


// Est ajouter avec laravel breeze
require __DIR__ . '/auth.php';
