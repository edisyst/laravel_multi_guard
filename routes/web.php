<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
    return view('welcome');
});

Route::group(['prefix'=>'admin','middleware'=>['admin:admin']],function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});



Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
//    return view('dashboard');
    return view('admin.index');
})->name('dashboard');


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
    return view('user.index');
})->name('dashboard');


// ADMIN ALL ROUTES
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminController::class, 'edit'])->name('admin.profile.edit');
Route::patch('/admin/profile/edit', [AdminController::class, 'update'])->name('admin.profile.update');

Route::get('/admin/password/edit', [AdminController::class, 'editPassword'])->name('admin.password.edit');
Route::post('/admin/password/update', [AdminController::class, 'updatePassword'])->name('admin.password.update');


// USER ALL ROUTES
Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
Route::get('/user/profile/edit', [UserController::class, 'edit'])->name('user.profile.edit');
Route::patch('/user/profile/edit', [UserController::class, 'update'])->name('user.profile.update');

Route::get('/user/password/edit', [UserController::class, 'editPassword'])->name('user.password.edit');
Route::post('/user/password/update', [UserController::class, 'updatePassword'])->name('user.password.update');




