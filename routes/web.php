<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\WelcomeController;
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
    return "Selamat Datang";
});

Route::get('/hello', function() {
    return "Hello World";
});

Route::get('/world', function() {
    return "World";
});

Route::get('/about', function() {
    return "NIM: 2241720091 <br> Nama: Gaco Razan Kamil";
});

Route::get('/user/{name?}', function($name="John") {
    return "Nama Saya " . $name;
});

Route::get('/posts/{post}/comments/{comment}', function($postId, $commentId) {
    return "Pos ke-" . $postId . " Komentar ke-" . $commentId;
});

Route::get('/articles/{id}', function($articleId) {
    return "Halaman Artikel dengan ID " . $articleId;
});

// Route::redirect('/', '/hello'); // Berfungsi unuk melakukan direct otomatis menuju halaman yang ditentukan


// Routing Menggunakan Controller
Route::get('/helloController', [WelcomeController::class, 'hello']);
Route::get('/indexController', [PageController::class, 'index']);
Route::get('/aboutController', [PageController::class, 'about']);
Route::get('/articlesController/{article}', [PageController::class, 'articles']);

// Routing PhotoController
Route::resource('photos', PhotoController::class);

// Membatasi crud PhotoController
Route::resource('photos', PhotoController::class)->only(['index', 'show']);
Route::resource('photos', PhotoController::class)->except(['create', 'store', 'update', 'destroy']);
