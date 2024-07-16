<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnakController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CfController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class , "index"])->name('index');
Route::get('/home', [UserController::class , "index"])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::get("profile" , [UserController::class ,"profile"])->name("profile");
    Route::put("profile" , [UserController::class , "update"])->name('profile.update');
    Route::get("history" , [UserController::class , "history"])->name('history');
    Route::get("anak" , [AnakController::class , "index"])->name('anak.index');
    Route::post("anak" , [AnakController::class , "store"])->name('anak.store');
    Route::get("anak/{id}" , [AnakController::class , "detail"])->name('anak.show');
    Route::get("periksa/{id}" , [CfController::class , "konsultasi"])->name('periksa.anak');
    Route::post("periksa/{id}" , [CfController::class , "calculateCF"])->name('calculate.cf');
    Route::post('/cf/confirm', [CfController::class , "confirmCf"])->name('cf.confirm');
    Route::get("/anak/edit/{id}" , [AnakController::class , "edit"])->name('anak.edit');
    Route::put("/anak/edit/{id}" , [AnakController::class , "update"])->name('anak.update');
    Route::get("/anak/delete/{id}" , [AnakController::class , "destroy"])->name('anak.destroy');
});


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, "login"])->name('login');
    Route::post('/login', [AuthController::class, "authenticate"])->name('authenticate');
    Route::get('/register', [AuthController::class, "register"])->name('register');
    Route::post('/register', [AuthController::class, "registerPost"])->name('register.post');
});




Route::middleware('auth')->group(function(){
    Route::get('admin' , [AdminController::class , "index"])->name('admin.index');
    Route::resource("gejala" , GejalaController::class);
    Route::resource("users" , UserAdminController::class);

    Route::post('logout', [AuthController::class , "logout"])->name('logout');
});
