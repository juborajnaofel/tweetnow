<?php

use App\Http\Controllers\Homefeed\HomeController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\FollowController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/view/{id}', [ProfileController::class, 'show'])->name('profile.view');

    Route::name('home.')->prefix('/home')->group(function () {
        Route::get('/', [HomeController::class, 'homefeed'])->name('feed');
        Route::get('/users/fetch', [HomeController::class, 'fetchUsers'])->name('users.fetch');
    });
    Route::name('post.')->prefix('/post')->group(function () {
        Route::resource('/', PostController::class);
        Route::get('/fetch', [PostController::class, 'fetchPosts'])->name('fetch');
    });
    Route::name('user.')->prefix('/user')->group(function () {
        Route::post('/follow/{followed_id}', [FollowController::class, 'follow'])->name('follow.user');;
        Route::post('/unfollow/{unfollowed_id}', [FollowController::class, 'unfollow'])->name('unfollow.user');
    });



});





require __DIR__ . '/auth.php';
