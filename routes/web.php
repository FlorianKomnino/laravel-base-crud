<?php

use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Guest\BookController as GuestBookController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('guest.index');
// });

Route::name('guest.')
    ->group(function () {
        // Route::get('/', [GuestBookController::class, 'index']);
        // Route::get('/', function() {
        //     return view('welcome')
        // });
        Route::resource('/books', GuestBookController::class);
    });

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/books/search', [AdminBookController::class, "search"])->name("search");
    Route::get('/books/trashed', [AdminBookController::class, 'trashed'])->name('trashed');
    Route::get('/books/{id}/restore', [AdminBookController::class, 'restore'])->name('restore');
    Route::delete('/books/{id}/force-delete', [AdminBookController::class, 'forceDelete'])->name('forceDelete');
    Route::resource('/books', AdminBookController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
