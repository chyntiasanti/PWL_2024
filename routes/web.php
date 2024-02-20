<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;


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
    return view('welcome');
});

//Basic Routing

//Praktikum
Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/world', function () {
    return 'World';
});

//Tugas
Route::get('/selamatdatang', function (){
    return 'Selamat Datang';
});

Route::get('/about', function (){
    return '<li> NIM : 2241720017
    <li> Nama : Chyntia Santi Nur Trisnawati';
});

//Route Parameters

//Praktikum
Route::get('/user/{name}', function ($name) {
    return 'Nama saya '.$name;
});

Route::get('/posts/{post}/comments/{comment}', function
($postId, $commentId) {
return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
});

//Tugas
Route::get('/articles/{id}/', function ($id) {
    return 'Halaman Artikel dengan ID ' .$id;
});

//Optional Parameters

//Praktikum
Route::get('/user/{name?}', function ($name='John') {
    return 'Nama saya '.$name;
});

//Route Name
Route::get('/user/profile', function() {
    //
    })->name('profile');

//Controller
Route::get('/hello', [WelcomeController::class,'hello']);

Route::get('/', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/articles/{id}', [PageController::class, 'articles']);

//Resource Controller
Route::resource('photos', PhotoController::class);
Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);
Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);

//View
Route::get('/greeting', function () {
    return view('blog.hello', ['name' => 'Chyntia Santi Nur Trisnawati']);
});

//Menampilkan View dari Controller
Route::get('/greeting', [WelcomeController::class,
'greeting']);