<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Livewire\ShoppingCart;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SearchController;
use App\Http\Livewire\CreateOrder;
use App\Http\Livewire\PaymentOrder;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\BlogController;

Route::get('/',[AdminController::class,'home'])->name('home');
Route::get('buscar',[SearchController::class,'buscar'])->name('search');
Route::get('buscar-note',[SearchController::class,'buscarNote'])->name('search.note');
Route::get('carrito-de-compras', ShoppingCart::class)->name('shopping-cart');
Route::get('/categoria/{category}',[CategoryController::class,'show'])->name('categories.show');
Route::get('/producto/{product}',[ProductController::class,'show'])->name('products.show');
Route::get('/maquinarias',[ProductController::class,'machinery'])->name('machinery');
Route::get('/maquinaria/{product}',[ProductController::class,'machineryShow'])->name('machinery.show');
Route::get('/categoria-en-maquinaria/{category}',[ProductController::class,'category'])->name('machinery.category');
Route::get('/nosotros',[AdminController::class,'about'])->name('about');
Route::get('/terminos-y-condiciones',[AdminController::class,'conditions'])->name('conditions');


Route::post('review/{product}', [ReviewController::class,'store'])->name('review.store');
Route::post('blog/{note}', [ReviewController::class,'blog'])->name('review.blog');

Route::post('image/upload',[ImageController::class,'upload'])->name('image.upload');
Route::post('/menssage',[AdminController::class,'menssage'])->name('menssage');
Route::get('/devoluciones-stock-crow',[StockController::class,'clean'])->name('devoluciones');

Route::get('/blog',[BlogController::class,'index'])->name('blog.index');
Route::get('/blog-detail/{slug}-{id}',[BlogController::class,'show'])->name('blog.show');
Route::get('/ofertas',[ProductController::class, 'offers'])->name('products.offers');
Route::get('/cotizacion',[AdminController::class,'cotizacion'])->name('cotizacion');

Route::post('/menssagecotizacion',[AdminController::class,'menssagecotizacion'])->name('menssagecotizacion');


Route::middleware(['auth'])->group(function(){
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/create', CreateOrder::class)->name('orders.create');
    Route::get('orders/{transaction}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('orders/{transaction}/payment', PaymentOrder::class)->name('orders.payment');
    Route::post('/paid/izipay', [OrderController::class, 'izipay'])->name('paid.izipay');
    
     Route::get('orders-thanks/{transaction}', [OrderController::class, 'thanks'])->name('orders.thanks');

    Route::post('topay', [OrderController::class, 'pay'])->name('orders.pay');
});