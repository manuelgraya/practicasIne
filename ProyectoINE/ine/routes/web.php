<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('product.index');

Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard',
 function () { return redirect()->route('product.index'); })->name('dashboard');

Route::middleware(['auth','isAdmin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');

    Route::patch('/product/{product}', [ProductController::class, 'update'])->name('product.update');

    Route::post('/product', [ProductController::class, 'store'])->name('product.store');

});

require __DIR__.'/auth.php';