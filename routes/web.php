<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuListController;
use App\Http\Controllers\MenuHistoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\MenuCategoryController;
use App\Http\Controllers\ReportController;

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



Route::middleware('auth')->group(function () {
    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    //default
    Route::get('/', function () {
        return view('pages.transaction.index', ["title" => "Transaction"]);
    });

    //transaction
    Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');

    //table
    Route::get('/table', [TableController::class, 'index'])->name('table.index');
    Route::post('/table/store', [TableController::class, 'store'])->name('table.store');
    Route::patch('/table/{id}', [TableController::class, 'update'])->name('table.update');
    Route::delete('/table/destroy{id}', [TableController::class, 'destroy'])->name('table.destroy');

    //menuList
    Route::get('/menuList', [MenuListController::class, 'index'])->name('menuList.index');
    Route::post('/menuList/store', [MenuListController::class, 'store'])->name('menuList.store');
    Route::patch('/menuList/{id}', [MenuListController::class, 'update'])->name('menuList.update');
    Route::delete('/menuList/destroy{id}', [MenuListController::class, 'destroy'])->name('menuList.destroy');

    //menuCategory
    Route::get('/menuCategory', [MenuCategoryController::class, 'index'])->name('menuCategory.index');
    Route::post('/menuCategory/store', [MenuCategoryController::class, 'store'])->name('menuCategory.store');
    Route::patch('/menuCategory/{id}', [MenuCategoryController::class, 'update'])->name('menuCategory.update');
    Route::delete('/menuCategory/destroy{id}', [MenuCategoryController::class, 'destroy'])->name('menuCategory.destroy');

    //menuHistory
    Route::get('/menuHistory', [MenuHistoryController::class, 'index'])->name('menuHistory.index');

    //report
    Route::get('/report', [ReportController::class, 'index'])->name('report.index');

    //cashier
    Route::get('/cashier', [CashierController::class, 'index'])->name('cashier.index');
});

require __DIR__ . '/auth.php';

// Route::group(['middleware' => 'auth'], function () {
// });
