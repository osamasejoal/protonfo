<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{LoginController, LogoutController, HomeController, FrontendController, UserProfileController};

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

// Route::get('/', function () {
//     // return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('backend.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



/*
|--------------------------------------------------------------------------
|                          LoginController
|--------------------------------------------------------------------------
*/
Route::get('login', [LoginController::class, 'login'])->name('login');



/*
|--------------------------------------------------------------------------
|                          LogoutController
|--------------------------------------------------------------------------
*/
Route::get('logout', [LogoutController::class, 'logout'])->name('logout');



/*
|--------------------------------------------------------------------------
|                          HomeController
|--------------------------------------------------------------------------
*/
Route::get('/home', [HomeController::class, 'index'])->name('home');



/*
|--------------------------------------------------------------------------
|                          FrontendController
|--------------------------------------------------------------------------
*/
Route::get('/', [FrontendController::class, 'frontpage'])->name('frontpage');



/*
|--------------------------------------------------------------------------
|                          UserProfileController
|--------------------------------------------------------------------------
*/
Route::get('/user/profile', [UserProfileController::class, 'index'])->name('user.profile');
Route::post('/user/profile/update', [UserProfileController::class, 'update'])->name('user.profile.update');
