<?php

use App\Http\Controllers\CategoryController;
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
// category route
Route::resource('/adminCategory', CategoryController::class);
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
     // /employeeAdmin/dashboard
     require __DIR__.'/employeeAdmin/employeeAdmin.php';












