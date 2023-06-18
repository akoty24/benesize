<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\AreaController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\ColorController;
use App\Http\Controllers\Dashboard\CountryController;
use App\Http\Controllers\Dashboard\CouponController;
use App\Http\Controllers\Dashboard\CouponUserController;
use App\Http\Controllers\Dashboard\IndexController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProductColorController;
use App\Http\Controllers\Dashboard\ProductOfferController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\SizeController;
use App\Http\Controllers\Dashboard\SubCategoryController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/index', [IndexController::class, 'index'])->name('index');
Route::resource('categories', CategoryController::class);
Route::resource('sub_categories', SubCategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('sizes', SizeController::class);
Route::resource('colors', ColorController::class);
Route::resource('product_colors', ProductColorController::class);
Route::resource('product_offers', ProductOfferController::class);

Route::resource('countries',CountryController::class);
Route::resource('cities',CityController::class);
Route::resource('areas',AreaController::class);

Route::resource('users',UserController::class);
Route::get('/get-cities', [UserController::class, 'getCities'])->name('get-cities');
Route::get('/get-areas', [UserController::class, 'getAreas'])->name('get-areas');

Route::resource('coupons',CouponController::class);
Route::resource('coupon_users',CouponUserController::class);

Route::resource('roles',RoleController::class);
Route::resource('permissions', PermissionController::class);

Route::middleware(['auth.guard:admin'])->group(function () {
    Route::post('logout', [RegisterController::class, 'logout'])->name('logout');
});

Route::get('register-form', [RegisterController::class, 'register_form'])->name('register.page');
Route::get('login-form', [LoginController::class, 'login_form'])->name('login.page');
Route::post('register', [RegisterController::class, 'Register'])->name('register');
Route::post('login', [LoginController::class, 'Login'])->name('login');

Route::get('index/{locale}', [IndexController::class, 'lang']);
