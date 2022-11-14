<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsahaController;
use Illuminate\Support\Facades\Route;


Route::resource('Usaha', UsahaController::class)->parameters([
    'edit' => 'id',
    'update' => 'id',
    'show' => 'id',
    'destroy' => 'id',
])->name('*', 'Usaha');

Route::get('Artikel', function(){
    return view('page.artikel');
})->name('artikel');

Route::resource('profile', ProfileController::class)->parameters([
    'edit' => 'id',
    'update' => 'id',
    'show' => 'id',
    'destroy' => 'id',
])->name('*', 'profil');
