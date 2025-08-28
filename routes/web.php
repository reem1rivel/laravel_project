<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InformationController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('show', [InformationController::class, 'showForm'])->name('show');
Route::post('store', [InformationController::class, 'store'])->name('store');
Route::put('update/{update_info}', [InformationController::class, 'update'])->name('update');
Route::delete('delete/{delete_info}', [InformationController::class, 'delete'])->name('delete');
Route::get('edit/{edit_info}', [InformationController::class, 'editInfo'])->name('edit');
