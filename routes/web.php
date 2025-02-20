<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\WelcomeController;


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

Route::get('/hello', [WelcomeController::class,'hello']);

Route::get('mahasiswa', function ($id) { });
Route::post('mahasiswa', function ($id) { });
Route::put('mahasiswa', function ($id) { });
Route::delete('mahasiswa', function($id) { });
Route::get('mahasiswa/{id}', function ($id) { });
Route::put('mahasiswa/{id}', function ($id) { });
Route::delete('mahasiswa/{id}', function ($id) { });


Route::get('/hello', function () {
    return 'Hello World';
});
Route::get('/world', function () {
    return 'World';
});

Route::get('/', function () {
    return 'Welcome RAHMAN THE QONQUIROR';
});

Route::get('/about', function () {
    return 'SAFRIZAL RAHMAN THE QONQUIROR | 2341760151';
});

Route::get('/user/{name}', function ($name) {
    return 'My name is ' . $name;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-' . $postId . " Komentar ke-: " . $commentId;
});


Route::get('/articles/{id}', function ($articlesId) {
    return 'Artikel ke-' . $articlesId;
});

Route::get('/user/profile', [UserProfileController::class, 'show'])->name('profile');


Route::get('/user/{name?}', function ($name = null) {
    return 'My name is ' . $name;
});

Route::get('/user/{name?}', function ($name = 'John') {
    return 'Nama saya- ' . $name;
});

Route::get('/user/{name}', function ($name) {
    return 'Nama saya- ' . $name;
})->where('name', '^(?!profile$).*');


// Route::get('/user/profile', function () {
//     //
// })->name('profile');

// Route::get(
//     '/user/profile',
//     [UserProfileController::class, 'show']
// )->name('profile');

// // Generating URLs...
// $url = route('profile');

// // Generating Redirects...
// return redirect()->route('profile');

Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {
        // Uses first & second middleware...
    });
    Route::get('/user/profile', function () {
        // Uses first & second middleware...
    });
});
Route::domain('{account}.example.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        //
    });
});
Route::middleware('auth')->group(function () {
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/post', [PostController::class, 'index']);
    Route::get('/event', [EventController::class, 'index']);
});


Route::prefix('admin')->group(function () {
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/post', [PostController::class, 'index']);
    Route::get('/event', [EventController::class, 'index']);
});

Route::redirect('/here', '/there');

Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);
