
<?php
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\dashboard\StoreController;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\StoreController as ControllersStoreController;

Route::get('/employeeAdmin/dashboard', function () { return view('employeeAdmin.dashboard');})->name('employeeAdmin/dashboard');
// Stores
Route::get('/employeeAdmin/stores', [ControllersStoreController::class, 'empStoresList'])->name('employeeAdmin/stores');
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
