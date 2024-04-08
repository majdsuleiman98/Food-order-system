<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/menu',[VisitorController::class,'index'])->name('Vpage');

Route::get('/category', [CategoryController::class, 'show'])->name('cat.show');
Route::post('/category/store', [CategoryController::class, 'store'])->name('cat.store');
Route::post('/category/update', [CategoryController::class, 'update'])->name('cat.update');
Route::get('/category/{id}', [CategoryController::class, 'destroy'])->name('cat.delete');

Route::get('/meal/create', [MealController::class, 'create'])->name('meal.create');
Route::post('/meal/store', [MealController::class, 'store'])->name('meal.store');
Route::get('/meal/show', [MealController::class, 'index'])->name('meal.index');
Route::get('/meal/edit/{id}', [MealController::class, 'edit'])->name('meal.edit');
Route::get('/meal/delete/{id}', [MealController::class, 'destroy'])->name('meal.delete');
Route::post('/meal/update/{id}', [MealController::class, 'update'])->name('meal.update');


Route::get('/addToCart/{meal}', [MealController::class, 'addToCart'])->name('cart.add');
Route::get('/shopping-cart', [MealController::class, 'showcart'])->name('cart.show');


Route::delete('/meals/{meal}', [MealController::class, 'delete'])->name('meal.remove'); //remove meal from cart
Route::put('/meals/{meal}', [MealController::class, 'updateqty'])->name('meal.updateqty'); //update qty in cart



Route::post('/order/store', [MealController::class, 'orderstore'])->name('order.store');
Route::post('/order/{id}/status', [HomeController::class, 'changestatus'])->name('order.status');


Route::get('/order/show', [HomeController::class, 'show_orders']);
Route::get('/order/show_details/{id}', [HomeController::class, 'show_order_details'])->name('show_details');

Route::get('/order/show_details_Admin/{id}', [HomeController::class, 'show_order_details_for_admin'])->name('show_order_details_for_admin');


Route::get('/user/profile', [ProfileController::class, 'index'])->name('profile');
Route::put('/user/profile/update', [ProfileController::class, 'update'])->name('profile.update');


Route::get('/checkout',[MealController::class, 'checkout'])->name('cart.checkout');

Route::get('/userspage',[HomeController::class, 'users_page'])->name('admin.userspage');


Route::get('/show/newuser',[ProfileController::class, 'show_new_user'])->name('newuser.show');
Route::post('/create/newuser',[ProfileController::class, 'add_new_user'])->name('newuser.create');


