<?php

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

// Руты для работы с тестовым контроллером
use App\Http\Controllers\MainController;
Route::get('/', [MainController::class, 'show_all_articles']);
Route::get('/one_article', [MainController::class, 'show_one_article']);
Route::get('/about_us', [MainController::class, 'show_about_us']);
Route::get('/contacts', [MainController::class, 'show_contacts']);

// Руты для работы с пользователями
use App\Http\Controllers\AuthController;
Route::get('/register', [AuthController::class, 'registration']);
Route::post('/create_user', [AuthController::class, 'create_user']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logOut']);

// Руты для работы со статьями
use App\Http\Controllers\ArticleController;
Route::resource('/article', ArticleController::class);

// Руты для работы с комментариями к статьям
use App\Http\Controllers\CommentController;
Route::group(['prefix' => '/comment'], function() {
	Route::post('/store', [CommentController::class, 'store']);
	Route::get('/edit/{id}', [CommentController::class, 'edit']);
	Route::post('/update/{id}', [CommentController::class, 'update']);
	Route::get('/delete/{id}', [CommentController::class, 'delete']);
});