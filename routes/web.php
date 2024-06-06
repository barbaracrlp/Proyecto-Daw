<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DesignerController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/home', 'DesignController@index')->name('home');

Route::get('/home', [DesignController::class, 'index'])->name('home');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/add-to-cart/{design}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.removeItem');

});

Route::resource('collections', CollectionController::class);

Route::resource('designs', DesignController::class);

/**ruta para las categorias diseños */
Route::get('/category/{id}/designs',[CategoryController::class,'showdesigns'])->name('category.designs');

Route::get('/type/{id}/designs',[TypeController::class,'showdesigns'])->name('type.designs');

Route::resource('categories', CategoryController::class);
Route::resource('types', TypeController::class);

Route::resource('carts', CartController::class);
Route::resource('cart-items', CartItemController::class);

Route::post('/cart/add', [CartItemController::class, 'addToCart'])->name('cartItem.addToCart');


require __DIR__.'/auth.php';
