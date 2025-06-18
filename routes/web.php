<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroceryItemController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[GroceryItemController::class,'index'])->name('grocery.index');
Route::post('/add',[GroceryItemController::class,'store'])->name('grocery.store');
Route::get('/edit/{id}',[GroceryItemController::class,'edit'])->name('grocery.edit');
Route::put('/update/{id}',[GroceryItemController::class,'update'])->name('grocery.update');
Route::delete('/delete/{id}',[GroceryItemController::class,'destroy'])->name('grocery.destroy');
Route::post('/toggle/{id}',[GroceryItemController::class,'toggle'])->name('grocery.toggle');