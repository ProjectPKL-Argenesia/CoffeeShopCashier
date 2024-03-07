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
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StruckController;
use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Table;

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
        $dataMenu = Menu::all();
        $dataMenuCategory = MenuCategory::all();
        $dataTable = Table::all();
        return view('pages.transaction.index', ["title" => "Transaction"], compact('dataMenu', 'dataMenuCategory', 'dataTable'));
    });

    //transaction
    Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');
    Route::post('/transaction/store', [TransactionController::class, 'store'])->name('transaction.store');

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
    //restock
    Route::patch('/menuList/restock/{id}', [MenuListController::class, 'restock'])->name('menuList.restock');

    //menuCategory
    Route::get('/menuCategory', [MenuCategoryController::class, 'index'])->name('menuCategory.index');
    Route::post('/menuCategory/store', [MenuCategoryController::class, 'store'])->name('menuCategory.store');
    Route::patch('/menuCategory/{id}', [MenuCategoryController::class, 'update'])->name('menuCategory.update');
    Route::delete('/menuCategory/destroy{id}', [MenuCategoryController::class, 'destroy'])->name('menuCategory.destroy');

    //menuHistory
    Route::get('/menuHistory', [MenuHistoryController::class, 'index'])->name('menuHistory.index');
    Route::delete('/menuHistory/destroy{id}', [MenuHistoryController::class, 'destroy'])->name('menuHistory.destroy');

    //report
    Route::get('/report', [ReportController::class, 'index'])->name('report.index');

    //cashier
    Route::get('/cashier', [CashierController::class, 'index'])->name('cashier.index');
    Route::post('/cashier/store', [CashierController::class, 'store'])->name('cashier.store');
    Route::patch('/cashier/{id}', [CashierController::class, 'update'])->name('cashier.update');
    Route::delete('/cashier/destroy{id}', [CashierController::class, 'destroy'])->name('cashier.destroy');

    //store
    Route::get('/store', [StoreController::class, 'index'])->name('store.index');
    Route::post('/store/store', [StoreController::class, 'store'])->name('store.store');
    
    //struck
    Route::get('/struck/report', [StruckController::class, 'struckreport'])->name('struck.report');
    Route::get('/struck/all-report', [StruckController::class, 'struckallreport'])->name('struck.allreport');
});

require __DIR__ . '/auth.php';

// Route::group(['middleware' => 'auth'], function () {
// });
