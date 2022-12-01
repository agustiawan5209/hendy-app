<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\NilaiMatrix;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $NilaiMatrix = NilaiMatrix::orderBy('ranking', 'asc')->paginate(4);
        $alternatif = Alternatif::all();
        return view('welcome', [
            'alternatif' => $alternatif,
            'nilaiMatrix' => $NilaiMatrix,
        ]);
    }
}
