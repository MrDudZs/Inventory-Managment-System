<?php

use App\Http\Controllers\SalesAvgReportController;
use App\Http\Controllers\StockReportController;
use App\Http\Middleware\CheckPermission;
use App\Http\Middleware\ForceLogout;
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


Route::get('/register-page', [RegisterController::class, 'showRegistrationForm'])
    ->name('register')
    ->middleware([CheckPermission::class . ':2']);


Route::post('/register', [RegisterController::class, 'register']);


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/** 
 * Route for Dashboard
 */
Route::middleware(['auth'])->group(function () {
    Route::get('/clerk-dashboard', [DashboardController::class, 'showClerkDashboard'])
        ->name('clerk.dashboard')
        ->middleware(CheckPermission::class . ':1');

    Route::get('/admin-dashboard', [DashboardController::class, 'showAdminDashboard'])
        ->name('admin.dashboard')
        ->middleware(CheckPermission::class . ':2');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard')
        ->middleware(ForceLogout::class);

    Route::post('/save-stock-report', [DashboardController::class, 'saveStockReport'])->middleware('auth');

    Route::get('/stock-data', [DashboardController::class, 'getStockData'])->middleware('auth');

    Route::get('sales-data', [DashboardController::class, 'getSalesData'])->middleware('auth');

    Route::post('/submit-category', [CategoryController::class, 'handleForm'])->name('submit-category');
    Route::post('/addStock', [ProductController::class, 'addStock'])->name('addStock');
    Route::post('/removeStock', [ProductController::class, 'removeStock'])->name('removeStock');
    Route::post('/addProduct', [ProductController::class, 'addProduct'])->name('addProduct');
    Route::post('/manageProduct', [ProductController::class, 'manageProduct'])->name('manageProduct');
    Route::get('/get-brands', [ProductController::class, 'getBrands']);
    Route::get('/get-names', [ProductController::class, 'getNames']);
});

/*
/ app\Http\Controllers\InvoiceController
*/
Route::get('/invoice-history', [InvoiceController::class, 'showInvoiceHistory'])->middleware('auth');


/* 
/ app\Http\Controllers\ProductController
*/
Route::post('/addStock', [ProductController::class, 'addStock'])->name('addStock');
Route::get('/addStock', [ProductController::class, 'addStock'])->name('showNewStockForm');
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

/*
    app\http\controllers\CategoryController
*/
Route::get('/categories', [CategoryController::class, 'index'])->name('dashboard');

/*
    app\Http\controllers\StockReportController
    app\Http\controllers\SalesAvgReportController

    This area stores the functions for the admin dashbaords history and generation of reports
*/
Route::get('/stock-history', [StockReportController::class, 'showStockReport'])->middleware('auth');
Route::get('/avg-sales-history', [SalesAvgReportController::class, 'showAvgSalesReport'])->middleware('auth');
Route::post('/save-avg-sales-report', [SalesAvgReportController::class, 'saveAvgSalesReport'])->middleware('auth');

Auth::routes();
