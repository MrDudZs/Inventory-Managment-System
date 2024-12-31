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
use App\Http\Controllers\ProductController;


Route::get('/', [HomeController::class, 'index'])->name('index');



Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/** 
 * Route for Dashboard
 */
Route::middleware(['auth'])->group(function () {
    Route::get('/clerk-dashboard', [DashboardController::class, 'showClerkDashboard'])->name('clerk.dashboard');
    Route::get('/admin-dashboard', [DashboardController::class, 'showAdminDashboard'])->name('admin.dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/submit-category', [CategoryController::class, 'handleForm'])->name('submit-category');
    Route::post('/newProduct', [ProductController::class, 'newProduct'])->name('newProduct');
    Route::get('/get-brands', [ProductController::class, 'getBrands']);
    Route::get('/get-names', [ProductController::class, 'getNames']);
});

/* 
/ app\Http\Controllers\ProductController
*/
Route::post('/newProduct', [ProductController::class, 'newProduct'])->name('newProduct');
Route::get('/newProduct', [ProductController::class, 'newProduct'])->name('showNewProductForm');
Route::get('/get-brands', [ProductController::class, 'getBrands']);
Route::get('/get-names', [ProductController::class, 'getNames']);

Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::post('/submit-category', [CategoryController::class, 'handleForm'])->name('submit-category');

Route::get('/sysadmin', [AdminController::class, 'index'])->name('sysAdmin');

Route::get('/fetch-product', [InvoiceController::class, 'fetchData'])->name('fetch-product'); 
Route::get('/create-invoice', [InvoiceController::class, 'create'])->name('create-invoice'); // Open the invoice form
Route::post('/handle-invoice', [InvoiceController::class, 'handleForm'])->name('handle-invoice'); // Makes Invoice layout for PDF
Route::post('/submit-invoice', [InvoiceController::class, 'submitInvoice'])->name('submit-invoice'); // Generate PDF edits db

Auth::routes();
