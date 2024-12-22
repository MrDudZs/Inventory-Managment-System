<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [HomeController::class, 'index'])->name('home');



Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'show'])->name(name: 'dashboard')->middleware(middleware: 'auth');
Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');
Route::get('/create-invoice', [InvoiceController::class, 'create'])->name('createInvoice');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/sysadmin', [AdminController::class, 'index'])->name('sysAdmin');
Route::get('/invoice-form', [InvoiceController::class, 'form'])->name('invoiceForm');

Auth::routes();
