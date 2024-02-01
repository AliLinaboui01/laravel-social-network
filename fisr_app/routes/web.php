<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\iamgController;
use App\Http\Controllers\information;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\showController;

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

// Route::name('profiles.')->prefix('profiles')->group(function () {
//     Route::controller(iamgController::class)->group(function () {
//         Route::get('/', 'index')->name('index');
//         Route::get('/create', 'create')->name('create');
//         Route::post('/', 'store')->name('store');
//         Route::delete('/{profile}', 'destroy')->name('destroy');
//         Route::get('/{profile}/edit', 'edite')->name('edit');
//         Route::put('/{profile}', 'update')->name('update');
//         Route::get('/{profile}', 'show')->where('id', '\d+')->name('show');
//     });
// });
// all this ^ with this ->
Route::resource('profiles', iamgController::class);
Route::get('/verify_email/{hash}', [iamgController::class, 'verifyEmail']);
Route::resource('publications', PublicationController::class);





Route::middleware('guest')->group(function () {
    Route::get('/login', [loginController::class, 'show'])->name('login.show');
    Route::post('/login', [loginController::class, 'login'])->name('login');
});



Route::middleware('auth')->group(function () {
    Route::get('/home', [homeController::class, 'index'])->name('homepage');
    Route::get('/logout', [loginController::class, 'logout'])->name('login.logout');
});


Route::get('/information', [information::class, 'index'])->name('information.index');

Route::get('/', [homeController::class, 'index']);





require __DIR__ . '/auth.php';
