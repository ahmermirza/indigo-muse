<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
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

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('favourite', [SiteController::class, 'favourite'])->name('favourite');
Route::get('contact-us', [SiteController::class, 'contactUs'])->name('contact-us');
// Route::get('/{param}', [SiteController::class, 'index'])->name('home');

Route::get('shop', [SiteController::class, 'shop'])->name('shop');
Route::get('product/{slug}', [SiteController::class, 'productDetails'])->name('product-details')->middleware('log.product.view');

Route::get('/cart', [CartController::class, 'showCart'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'removeCartItem'])->name('cart.remove');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::middleware('verified')->group(function() {
        Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
        Route::get('/capture-payment', [CheckoutController::class, 'capturePayment'])->name('checkout.capture');
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
