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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');
    Route::get('/clerk-dashboard', [DashboardController::class, 'showClerkDashboard'])->name('clerk.dashboard');
    Route::get('/admin-dashboard', [DashboardController::class, 'showAdminDashboard'])->name('admin.dashboard');
});
Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::post('/submit-category', [CategoryController::class, 'handleForm'])->name('submit-category');

Route::get('/sysadmin', [AdminController::class, 'index'])->name('sysAdmin');

Route::get('/create-invoice', [InvoiceController::class, 'create'])->name('create-invoice'); // Open the invoice form
Route::post('/handle-invoice', [InvoiceController::class, 'handleForm'])->name('handle-invoice'); // Makes Invoice layout for PDF
Route::get('/submit-invoice', [InvoiceController::class, 'submitInvoice'])->name('submit-invoice'); // Generate PDF edits db

Auth::routes();
