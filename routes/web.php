<?php

use App\Http\Controllers\FuelsContoller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakerController;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('makers', [MakerController::class, 'index'])->name('makers');
Route::get("fuels",[FuelsContoller::class,"index"])->name("fuels");
Route::delete("makers/{id}",[MakerController::class,"destroy"])->name('makers.destroy');
Route::post("makers/{id}",[MakerController::class,"edit"])->name('makers.edit');
//Route::put('/makers/{id}', [MakerController::class, 'update'])->name('makers.update');
//Route::put()
