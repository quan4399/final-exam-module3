<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

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
Route::prefix('shop')->group(function (){
    Route::get('/',[ShopController::class,'index'])->name('shops.index');
    Route::get('/create',[ShopController::class,'create'])->name('shops.create');
    Route::post('/create',[ShopController::class,'store'])->name('shops.store');
    Route::get("/{id}/update",[ShopController::class,'edit'])->name('shops.edit');
    Route::post('/{id}/update',[ShopController::class,'update'])->name('shops.update');
    Route::get('/{id}/destroy',[ShopController::class,'destroy'])->name('shops.destroy');
    Route::post('/search',[ShopController::class,'search'])->name('shops.search');
});

