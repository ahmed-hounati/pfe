<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrderCardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PlatController;
use GuzzleHttp\Middleware;

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

Route::get('/', [AuthController::class, 'home'])->name('home');



Route::get('/register', [AuthController::class, 'getRegisterForm'])->name('registerForm');
Route::post('/register', [AuthController::class, 'create'])->name('register');
Route::get('/login', [AuthController::class, 'getLoginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/categories', [CategoriesController::class, 'getCategories'])->name('categories');


Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/resto/dashboard', [AuthController::class, 'resto'])->name('resto.dashboard')->middleware('resto');
Route::get('/plats', [PlatController::class, 'allPlats'])->name('allPlats')->middleware('resto');
Route::get('/plats/create', [PlatController::class, 'create'])->name('createPlat')->middleware('resto');
Route::post('/plats/post', [PlatController::class, 'store'])->name('addPlat')->middleware('resto');
Route::get('/plats/{id}/edit', [PlatController::class, 'edit'])->name('plats.edit')->middleware('resto');
Route::put('/plats/{id}/update', [PlatController::class, 'update'])->name('updatePlat')->middleware('resto');
Route::delete('/plats/{id}/delete', [PlatController::class, 'destroy'])->name('plats.destroy')->middleware('resto');

Route::get('/commands', [OrderCardController::class, 'getCommands'])->name('getCommands')->middleware('resto');
Route::post('/command/accept/{id}', [OrderCardController::class, 'confirmOrder'])->name('command.accept')->middleware('resto');
Route::post('/command/cancel/{id}', [OrderCardController::class, 'cancelOrder'])->name('command.cancel')->middleware('resto');

Route::get('/Restorents', [AuthController::class, 'getRest'])->name('allResto');
Route::get('/Restorents/{id}/plats', [PlatController::class, 'restoPlats'])->name('restoPlats');
Route::get('/category/{id}/plats', [PlatController::class, 'categoryPlats'])->name('categoryDetails')->middleware('user');
Route::get('/user/categories', [CategoriesController::class, 'AllCategories'])->name('user.categories')->middleware('user');
Route::get('/user/dashboard', [PlatController::class, 'getPlats'])->name('user.dashboard')->middleware('user');
Route::post('/add/{id}/toCard/', [CardController::class, 'addToCard'])->name('AddToCard')->middleware('user');
Route::get('/cart/plats', [CardController::class, 'cardPlats'])->name('carPlats')->middleware('user');
Route::post('/order/{cards}/confirm', [OrderController::class, 'confirmOrder'])->name('addOrder')->middleware('user');
Route::delete('/cart/{id}/delete', [CardController::class, 'delete'])->name('cart.plats.delete')->middleware('user');
Route::get('/count', [CardController::class, 'getOrderCount'])->name('count')->middleware('user');


Route::get('/card', [CardController::class, 'getCard'])->name('card')->middleware('user');
Route::get('/total/{id}', [CardController::class, 'getCardTotal'])->name('cardTotal')->middleware('user');
Route::put('/card/plus/{id}', [CardController::class, 'plus'])->name('plus')->middleware('user');

Route::put('/card/minus/{id}', [CardController::class, 'minus'])->name('minus')->middleware('user');


Route::get('/orders/all', [OrderController::class, 'getOrders'])->name('payment')->middleware('user');
Route::get('/ticket/{id}', [CardController::class, 'ticket'])->name('ticket')->middleware('user');
Route::get('/search', [AuthController::class, 'search'])->name('resto.search')->middleware('user');



Route::get('/admin/dashboard', [AuthController::class, 'admin'])->name('admin.dashboard')->middleware('admin');
Route::get('/admin/users', [AuthController::class, 'adminUsers'])->name('adminUsers')->middleware('admin');
Route::get('/admin/restaurants', [AuthController::class, 'adminRestos'])->name('adminRestos')->middleware('admin');
Route::get('/admin/plats', [AuthController::class, 'adminPlats'])->name('adminPlats')->middleware('admin');
Route::post('/admin/ban/{id}', [AuthController::class, 'ban'])->name('admin.ban')->middleware('admin');
Route::post('/admin/unban/{id}', [AuthController::class, 'unban'])->name('admin.unban')->middleware('admin');
Route::get('/admin/add/categories', [CategoriesController::class, 'add'])->name('categories.add')->middleware('admin');
Route::post('/admin/store/categories', [CategoriesController::class, 'store'])->name('categories.store')->middleware('admin');
Route::get('/category/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit')->middleware('admin');
Route::put('/category/update/{id}', [CategoriesController::class, 'update'])->name('update.Categories')->middleware('admin');
Route::delete('/category/destroy/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy')->middleware('admin');