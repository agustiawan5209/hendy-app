<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::orderBy('kode', 'asc')->get();
        $batas = $kriteria->count();
        return view('admin.perhitungan.index', [
            'kriteria'=> $kriteria,
            'batas'=> $batas,
        ]);
    }
}
