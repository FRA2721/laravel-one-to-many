<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;

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

// group routes to get all the routes that i need;
Route::middleware(["auth", "verified"])
    ->name("admin.")
    ->prefix("admin")
    ->group(function () {

        // all routes inside the function
        Route::get("/", [DashboardController::class, "index"])->name("dashboard"); // /admin.dashboard
        Route::resource("posts", PostController::class)->parameters(["posts" => "post:slug"]);
    });

require __DIR__.'/auth.php';
