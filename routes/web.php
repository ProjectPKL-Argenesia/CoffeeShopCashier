<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sidebar', function () {
    return view('layouts.sidebar');
});

Route::get('/cashier', function () {
    return view('pages.cashier');
})->name('cashier');

Route::get('/table', function () {
    return view('pages.table');
})->name('table');

// Route::get('/cashier', function () {
//     $title = 'Cashier';  
//     return view('pages.cashier')->with('title', $title);
// })->name('cashier');

// Route::get('/table', function () {
//     $title = 'Table';  
//     return view('pages.table')->with('title', $title);
// })->name('table');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
