<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\NilaiMatrix;
use Illuminate\Http\Request;
use App\Models\NilaiPrefensi;
use App\Models\NilaiBobotKriteria;

class PerhitunganController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::orderBy('kode', 'asc')->get();
        $batas = $kriteria->count();
        $NBK = new NilaiBobotKriteriaController();
        $matrix = $NBK->MatrixAHP();
        return view('admin.perhitungan.index', [
            'kriteria'=> $kriteria,
            'batas'=> $batas,
            'matrix'=> $matrix,
        ]);
    }
    public function perhitungan()
    {
        // Panggil Controller Nilai Bobot Kriteria
        $NBK = new NilaiBobotKriteriaController();
        // Matirx Perhitungan Kriteria
        $bobot = NilaiBobotKriteria::with(['datakriteria1', 'datakriteria2'])->get();
        $kriteria = Kriteria::with(['kriteria1', 'kriteria2'])->orderBy('kode', 'asc')->get()->toArray();
        // dd($kriteria);
        $prefensi = NilaiPrefensi::orderBy('kode', 'asc')->get();
        //Matrix
        $matrix = $NBK->MatrixAHP();
        // Prioritas
        $prioritas = $NBK->PrioritasAHP();
        // Matrix ConsistencyMeasure
        $CM = $NBK->ConsistencyMeasure();

        // Matrix Alternatif controller
        $alternatif = Alternatif::all()->toArray();
        // Matrix
        $NBA = new NilaiBobotAlternatifController();
        $matrixAlternatif = $NBA->BobotAHP();
        $hasilAkhir = $NBA->NilaiAKhir();
        // dd($hasilAkhir);
        $NilaiMatrix = NilaiMatrix::orderBy('ranking', 'desc')->get();
        return view('admin.perhitungan.perhitungan', [
            'bobot' => $bobot,
            'kriteria' => $kriteria,
            'prefensi' => $prefensi,
            'prioritas' => $prioritas,
            'matrix' => $matrix,
            'CM' => $CM,
            // Matirx ALternatif
            'matrixalternatif'=> $matrixAlternatif,
            'alternatif'=> $alternatif,
            'hasilAkhir'=> $hasilAkhir,
            'NilaiMatrix'=> $NilaiMatrix,
        ]);
    }
}
