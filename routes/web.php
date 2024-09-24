<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\faqsController;
use App\Http\Controllers\productController;
use App\Http\Controllers\inventoryController;
use App\Http\Controllers\transactionController;
use App\Http\Controllers\AccountingController;
use App\Http\Controllers\helpController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\orderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\notificationController;
use App\Http\Controllers\auditLogController;
use App\Models\notifications;

Route::middleware('auth')->group(function () {    
    Route::post('/notify', [NotificationController::class, 'notify']);});
    Route::post('/order', [OrderController::class, 'store']);


Route::post('/notify', function () {
        $userId = Auth::guard('web')->id();
    
        notifications::create([
            'user_id' => $userId,
            'message' => 'A new order has been created successfully.'
        ]);
    
        return response()->json(['message' => 'Notification created successfully']);
    })->middleware('auth');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::resource('products', ProductController::class);
Route::resource('customers', CustomerController::class);
Route::resource('inventory', InventoryController::class);
Route::resource('orders', OrderController::class);
Route::resource('transactions', TransactionController::class);
Route::get('/accounting', [AccountingController::class, 'index'])->name('accounting.index');
Route::get('/help', [HelpController::class, 'index'])->name('help');
Route::get('/faqs', [faqsController::class, 'index'])->name('faqs');

Route::resource('notifications', NotificationController::class);

Route::get('audit-logs', [auditLogController::class, 'index'])->name('audit-logs.index');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/products/{id}/image/edit', [ProductController::class, 'editImage'])->name('products.image.edit');
Route::put('/products/{id}/image/update', [ProductController::class, 'updateImage'])->name('products.image.update');

Route::get('/products/{id}/stock/edit', [ProductController::class, 'editStock'])->name('products.stock.edit');
Route::put('/products/{id}/stock/update', [ProductController::class, 'updateStock'])->name('products.stock.update');

route::get('customers/segment', [CustomerController::class, 'segment'])->name('customers.segment');

route::get('customers/{id}/transactions', [CustomerController::class, 'transactions'])->name('customers.transactions');