<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\KriteriaController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['auth', 'verified'], function () {
    Route::group(['prefix' => 'Kriteria', 'as' => 'Kriteria.'], function () {
        Route::controller(KriteriaController::class)->group(function () {
            Route::get("/", 'index')->name('index');
            Route::post("/create", 'store')->name('store');
            Route::get("/edit/{id}", 'edit')->name('edit');
            Route::put("/update/{id}", 'update')->name('update');
            Route::get("/destroy/{id}", 'destroy')->name('destroy');
        });
    });
    Route::group(['prefix' => 'Alternatif', 'as' => 'Alternatif.'], function () {
        Route::controller(AlternatifController::class)->group(function () {
            Route::get("/", 'index')->name('index');
            Route::post("/create", 'store')->name('store');
            Route::get("/edit/{id}", 'edit')->name('edit');
            Route::put("/update/{id}", 'update')->name('update');
            Route::get("/destroy/{id}", 'destroy')->name('destroy');
        });
    });
});



require __DIR__ . '/auth.php';
require __DIR__ . '/page.php';
