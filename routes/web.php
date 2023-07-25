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
//layout Admin Store
Route::get('/layout', function () {
    return view('adminStore.adminLayout');
});
//dashboard Admin Store
Route::get('/admin/dashboard', function () { return view('adminStore/dashboard');})->name('admin/dashboard');
// Stores
Route::resource('/adminStores', StoreController::class);
// employee route
Route::resource('/adminEmployee', EmployeeAdminController::class);
// list product route
Route::get('/admin/product', function () {
    $product = Product::all();
     return view('adminStore.product.listProduct',compact('product'));})->name('admin/product');
// report route
Route::get('/admin/report', function () { return view('adminStore.reports.listReport');})->name('admin/report');
//delivery route
Route::resource('/adminDelivery', DeliveryController::class);
// support route
Route::get('/admin/support', function () { return view('adminStore.support.support');})->name('admin/support');
// list order route
Route::get('/admin/order', function () {
    $order = Order::all();
     return view('adminStore.order.listOrder',compact('order'));})->name('admin/order');






// employee Admin route
Route::get('/employeeAdmin/dashboard', function () { return view('employeeAdmin.dashboard');})->name('employeeAdmin/dashboard');
// Stores
Route::get('/employeeAdmin/stores', [StoreController::class, 'empStoresList'])->name('employeeAdmin/stores');
Route::get('/employeeAdmin/stores/create', [StoreController::class, 'empCreateStore'])->name('employeeAdmin/stores/create');
Route::post('/employeeAdmin/stores/store', [StoreController::class, 'empStore'])->name('employeeAdmin/stores/store');
Route::get('/employeeAdmin/stores/edit/{id}', [StoreController::class, 'empEdit']);
Route::post('/employeeAdmin/stores/update/{id}', [StoreController::class, 'empUpdate']);
Route::delete('/employeeAdmin/stores/delete/{id}', [StoreController::class, 'empDelete']);
// List product route
Route::get('/employeeAdmin/product', function () {
    $product = Product::all();
     return view('employeeAdmin.product.listProduct',compact('product'));})->name('employeeAdmin/product');
// List support route
Route::get('/employeeAdmin/support', function () { return view('employeeAdmin.support.support');})->name('employeeAdmin/support');
// List order route
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











