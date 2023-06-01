<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WebController;
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
// Web Routes
Route::get('/',[WebController::class,'home'])->name("home.web");
Route::get('/about',[WebController::class,'about'])->name("about.web");
Route::get('/service',[WebController::class,'service'])->name("service.web");
Route::get('/team',[WebController::class,'team'])->name("team.web");
Route::get('/shop',[WebController::class,'shop'])->name("shop.web");
Route::get('/account',[WebController::class,'account'])->name("account.web");
Route::match(['get','post'],'/register',[WebController::class,'register'])->name("register.web");

// Admin routes
Route::prefix('admin')->group( function(){
    Route::get('dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
});

// Auth routes
Route::prefix('auth')->group( function(){
    Route::match(['get','post'],'login',[AuthController::class,'login'])->name('auth.login');
    Route::match(['get','post'],'register',[AuthController::class,'register'])->name('auth.register');
    Route::match(['get','post'],'logout',[AuthController::class,'logout'])->name('auth.logout');
});
