<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\StockController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/home', function () {
    return view('home');
});

// Route::get('/product', function () {
//     return view('product');
// });

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/register', function () {
//     return view('register');
// });


Route::controller(StockController::class)->group(function() {
    Route::get('/add-product', [StockController::class, 'createStock'])->middleware('admin');
    Route::post('/add-product1', [StockController::class, 'createStock1']);
    Route::get('/product', [StockController::class, 'viewStock']);
    Route::get('/edit-product/{id}', [StockController::class, 'editStock'])->middleware('admin');
    Route::patch('/update-product/{id}', [StockController::class, 'updateStock'])->middleware('admin');
    Route::delete('/delete-product/{id}', [StockController::class, 'deleteStock'])->middleware('admin');
});

Route::get('/add-category', [CategoryController::class, 'add'])->middleware('admin');
Route::post('/add-category1', [CategoryController::class, 'add1']);

Route::get('/add-shipment', [ShipmentController::class, 'add'])->middleware('admin');
Route::post('/add-shipment1', [ShipmentController::class, 'add1']);

Route::get('/add-order/{id}', [OrderController::class, 'add']);
Route::post('/add-order1/{id}', [OrderController::class, 'add1']);

Route::get('/add-faktur/{id}', [KeranjangController::class, 'add']);
Route::post('/add-faktur1', [KeranjangController::class, 'add1']);
