<?php

use App\Http\Controllers\Admin\ProfilesController;
use App\Http\Controllers\Admin\QuestionsController;
use App\Http\Controllers\Admin\SpecialitiesController;
use App\Http\Controllers\Admin\TypesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware("auth")->group(function(){

    Route::get("/dashboard",[HomeController::class, "dashboard"])->name("dashboard");
});

Route::middleware(["auth","role:admin"])->prefix("admin")->name("admin.")->group(function (){

    Route::get("profile",[ProfilesController::class, "index"])->name("profile");
    Route::put("profile",[ProfilesController::class, "update"])->name("profile.update");
    Route::put("profile/password",[ProfilesController::class, "updatePassword"])->name("profile.update-password");


    Route::resource("specialities", SpecialitiesController::class);

    Route::resource("types", TypesController::class);

    Route::resource("questions", QuestionsController::class);

});
