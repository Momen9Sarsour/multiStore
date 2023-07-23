<?php

use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\EmployeeAdminController;
use App\Http\Controllers\StoreController;
use App\Models\Order;
use App\Models\Product;
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
Route::get('/layout', function () {
    return view('adminStore.adminLayout');
});
Route::get('/admin/dashboard', function () { return view('adminStore/dashboard');})->name('admin/dashboard');
// Stores
Route::get('/admin/stores', [StoreController::class, 'storesList'])->name('admin/stores');
Route::get('/admin/stores/create', [StoreController::class, 'createStore'])->name('admin/stores/create');
Route::post('/admin/stores/store', [StoreController::class, 'store'])->name('admin/stores/store');
Route::get('/admin/stores/edit/{id}', [StoreController::class, 'edit']);
Route::post('/admin/stores/update/{id}', [StoreController::class, 'update']);
Route::delete('/admin/stores/delete/{id}', [StoreController::class, 'destroy']);
// employee route
Route::get('/admin/employee', [EmployeeAdminController::class, 'employeesList'])->name('admin/employee');
Route::get('/admin/employee/create', [EmployeeAdminController::class, 'createEmployee'])->name('admin/employee/create');
Route::post('/admin/employee/store', [EmployeeAdminController::class, 'store'])->name('admin/employee/store');
Route::get('/admin/employee/edit/{id}', [EmployeeAdminController::class, 'edit']);
Route::post('/admin/employee/update/{id}', [EmployeeAdminController::class, 'update']);
Route::delete('/admin/employee/delete/{id}', [EmployeeAdminController::class, 'destroy']);
// support route
Route::get('/admin/support', function () { return view('adminStore.support.support');})->name('admin/support');
// order route
Route::get('/admin/report', function () { return view('adminStore.reports.listReport');})->name('admin/report');
// order product
Route::get('/admin/product', function () {
    $product = Product::all();
     return view('adminStore.product.listProduct',compact('product'));})->name('admin/product');
     // order product
     Route::get('/admin/order', function () {
    $order = Order::all();
     return view('adminStore.order.listOrder',compact('order'));})->name('admin/order');
//delivery route
Route::get('/admin/delivery', [DeliveryController::class, 'deliveryList'])->name('admin/delivery');
Route::get('/admin/delivery/create', [DeliveryController::class, 'createDelivery'])->name('admin/delivery/create');
Route::post('/admin/delivery/store', [DeliveryController::class, 'store'])->name('admin/delivery/store');
Route::get('/admin/delivery/edit/{id}', [DeliveryController::class, 'edit']);
Route::post('/admin/delivery/update/{id}', [DeliveryController::class, 'update']);
Route::delete('/admin/delivery/delete/{id}', [DeliveryController::class, 'destroy']);




// employee Admin route
Route::get('/employeeAdmin/dashboard', function () { return view('employeeAdmin.dashboard');})->name('employeeAdmin/dashboard');
// Stores
Route::get('/employeeAdmin/stores', [StoreController::class, 'empStoresList'])->name('employeeAdmin/stores');
Route::get('/employeeAdmin/stores/create', [StoreController::class, 'empCreateStore'])->name('employeeAdmin/stores/create');
Route::post('/employeeAdmin/stores/store', [StoreController::class, 'empStore'])->name('employeeAdmin/stores/store');
Route::get('/employeeAdmin/stores/edit/{id}', [StoreController::class, 'empEdit']);
Route::post('/employeeAdmin/stores/update/{id}', [StoreController::class, 'empUpdate']);
Route::delete('/employeeAdmin/stores/delete/{id}', [StoreController::class, 'empDestroy']);
//
// order product
Route::get('/employeeAdmin/product', function () {
    $product = Product::all();
     return view('employeeAdmin.product.listProduct',compact('product'));})->name('employeeAdmin/product');
// support route
Route::get('/employeeAdmin/support', function () { return view('employeeAdmin.support.support');})->name('employeeAdmin/support');
// order product
Route::get('/employeeAdmin/order', function () {
    $order = Order::all();
    return view('employeeAdmin.order.listOrder',compact('order'));})->name('employeeAdmin/order');
//delivery route
Route::get('/employeeAdmin/delivery', [DeliveryController::class, 'empDeliveryList'])->name('employeeAdmin/delivery');
Route::get('/employeeAdmin/delivery/create', [DeliveryController::class, 'empCreateDelivery'])->name('employeeAdmin/delivery/create');
Route::post('/employeeAdmin/delivery/store', [DeliveryController::class, 'empStore'])->name('employeeAdmin/delivery/store');
Route::get('/employeeAdmin/delivery/edit/{id}', [DeliveryController::class, 'empEdit']);
Route::post('/employeeAdmin/delivery/update/{id}', [DeliveryController::class, 'empUpdate']);
Route::delete('/employeeAdmin/delivery/delete/{id}', [DeliveryController::class, 'empDestroy']);











