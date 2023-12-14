<?php

use App\Http\Controllers\CashierController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TableController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', function () {
        return view('pages.cashier.index', ["title" => "Cashier"]);
    });
});

require __DIR__ . '/auth.php';

Route::group(['middleware' => 'auth'], function () {
    //cashier
    Route::get('/cashier', [CashierController::class, 'index'])->name('cashier.index');

    //table
    Route::get('/table', [TableController::class, 'index'])->name('table.index');
    
    //menu
    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
});
