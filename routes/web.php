<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;

// Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/', function() {
    return view('landing');
});
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');
Route::get('/create-invoice', [InvoiceController::class, 'create'])->name('createInvoice');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/sysadmin', [AdminController::class, 'index'])->name('sysAdmin');
Route::get('/invoice-form', [InvoiceController::class, 'form'])->name('invoiceForm');

Route::post('/submit-category', [CategoryController::class, 'handleForm'])->name('submit-category');
Route::post('/submit-invoiceForm', [InvoiceController::class, 'handleForm'])->name('submit-invoiceForm');

Route::get('/fetch-product', [InvoiceController::class, 'fetchData'])->name('fetch-product');

Auth::routes();
