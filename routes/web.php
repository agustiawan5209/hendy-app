<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\NilaiPrefensiController;
use App\Http\Controllers\NilaiBobotKriteriaController;
use App\Http\Controllers\NilaiBobotAlternatifController;
use App\Http\Controllers\PerhitunganController;

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
    Route::group(['prefix' => 'nilaiPrefensi', 'as' => 'nilaiPrefensi.'], function () {
        Route::controller(NilaiPrefensiController::class)->group(function () {
            Route::get("/", 'index')->name('index');
            Route::post("/create", 'store')->name('store');
            Route::get("/edit/{id}", 'edit')->name('edit');
            Route::put("/update/{id}", 'update')->name('update');
            Route::get("/destroy/{id}", 'destroy')->name('destroy');
        });
    });
    Route::group(['prefix' => 'NilaiBobotKriteria', 'as' => 'NilaiBobotKriteria.'], function () {
        Route::controller(NilaiBobotKriteriaController::class)->group(function () {
            Route::get("/", 'index')->name('index');
            Route::post("/create", 'store')->name('store');
            Route::get("/edit/{id}", 'edit')->name('edit');
            Route::put("/update", 'update')->name('update');
            Route::get("/GetKriteria", 'GetKriteria')->name('GetKriteria');
            Route::get("/getNilaiBobotKriteria/{kriteria1}/{kriteria2}", 'getNilaiBobotKriteria')->name('getNilaiBobotKriteria');
            Route::get("/getNilaiBobotKriteria2/{kriteria2}/{kriteria1}", 'getNilaiBobotKriteria2')->name('getNilaiBobotKriteria2');
        });
    });
    Route::group(['prefix' => 'NilaiBobotAlternatif', 'as' => 'NilaiBobotAlternatif.'], function () {
        Route::controller(NilaiBobotAlternatifController::class)->group(function () {
            Route::get("/", 'index')->name('index');
            Route::post("/create", 'store')->name('store');
            Route::put("/edit", 'edit')->name('edit');
            Route::get("/update/{kode}", 'update')->name('update');
            Route::get("/destroy/{id}", 'destroy')->name('destroy');
            Route::get("/GetBobot/{kode}/{alternatif1}/{alternatif2}", 'getBobotAlternatif')->name('getBobotAlternatif');

        });
    });
    Route::group(['prefix' => 'Perhitungan', 'as' => 'Perhitungan.'], function () {
       Route::get('/', [PerhitunganController::class, 'index'])->name('Index');
    });
});



require __DIR__ . '/auth.php';
require __DIR__ . '/page.php';
