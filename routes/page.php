<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsahaController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'Usaha', 'as' => 'Usaha.'], function () {
    Route::controller(UsahaController::class)->group(function () {
        Route::get("/", 'index')->name('index');
        Route::post("/cari", 'GetAlternatif')->name('GetAlternatif');
        Route::post("/create", 'store')->name('store');
        Route::get("/edit/{id}", 'edit')->name('edit');
        Route::put("/update/{id}", 'update')->name('update');
        Route::get("/destroy/{id}", 'destroy')->name('destroy');
    });
});

Route::get('Artikel', function(){
    return view('page.artikel');
})->name('artikel');

Route::resource('profile', ProfileController::class)->parameters([
    'edit' => 'id',
    'update' => 'id',
    'show' => 'id',
    'destroy' => 'id',
])->name('*', 'profil');
