<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kecamatan;
use App\Models\NilaiMatrix;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $NilaiMatrix = NilaiMatrix::orderBy('ranking', 'desc')->paginate(5);
        $kecamatan = Kecamatan::all();
        $alternatif = Alternatif::all();
        return view('welcome', [
            'alternatif' => $alternatif,
            'nilaiMatrix' => $NilaiMatrix,
            'kecamatan'=> $kecamatan,
        ]);
    }
    public function getKecamatan($kecamatan){
        $NilaiMatrix = NilaiMatrix::where('kecamatan', '=', $kecamatan)->orderBy('ranking', 'desc')->get();
        return view('kecamatan', [
            'nilaiMatrix'=> $NilaiMatrix,
            'kecamatan'=> $kecamatan,
        ]);
    }
}
