<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\NilaiPrefensi;
use Illuminate\Support\Collection;
use App\Models\NilaiBobotAlternatif;
use App\Http\Requests\StoreNilaiBobotAlternatifRequest;
use App\Http\Requests\UpdateNilaiBobotAlternatifRequest;
use App\Models\NilaiMatrix;

class NilaiBobotAlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $alternatif = Alternatif::all()->toArray();
        $prefensi = NilaiPrefensi::all();
        $kriteria = Kriteria::all()->toArray();
        // dd($request->kode);
        return view('admin.nilaibobotalternatif.index', [
            'alternatif' => $alternatif,
            'prefensi' => $prefensi,
            'kriteria' => $kriteria,
            'kode_kriteria' => $request->kode,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createKode()
    {
        $nilai = NilaiBobotAlternatif::max('kode');
        $kode = "NBA";
        if ($nilai == null) {
            $kode = "NBA01";
        } else {
            $spr = substr($nilai, 3, 2);
            $spr++;
            $kode = sprintf($kode . '%02s', $spr);
        }
        return $kode;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNilaiBobotAlternatifRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($kode)
    {
        $alternatif = Alternatif::all()->toArray();
        // dd($alternatif);
        if (count($alternatif) > 0) {
            $nilai_kode = $this->createKode();
            for ($k = 0; $k < count($alternatif); $k++) {
                for ($i = 0; $i < count($alternatif); $i++) {
                    // dd($alternatif[$k]);
                    $bobot1 = NilaiBobotAlternatif::where('kriteria_id', '=', $kode)
                        ->where('alternatif1', '=', $alternatif[$k]['kode'])
                        ->where('alternatif2', '=', $alternatif[$i]['kode'])
                        ->get();
                    if ($bobot1->count() < 1) {
                        NilaiBobotAlternatif::insert([
                            [
                                'kode' => $nilai_kode,
                                'kriteria_id' => $kode,
                                'nilai_banding' => '1',
                                'alternatif1' => $alternatif[$k]['kode'],
                                'alternatif2' => $alternatif[$i]['kode'],
                            ],
                        ]);
                    }
                }
            }
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NilaiBobotAlternatif  $nilaiBobotAlternatif
     * @return \Illuminate\Http\Response
     */
    public function edit(StoreNilaiBobotAlternatifRequest $request)
    {
        $bobot1 = NilaiBobotAlternatif::where('kriteria_id', '=', $request->kriteria_id)
            ->where('alternatif1', '=', $request->alternatif1)
            ->where('alternatif2', '=', $request->alternatif2)
            ->first();
        if ($bobot1 == null) {
            NilaiBobotAlternatif::create([
                'kode' => $this->createKode(),
                'kriteria_id' => $request->kode,
                'nilai_banding' => '1',
                'alternatif1' => $request->alternatif1,
                'alternatif2' => $request->alternatif2,
            ]);
        } else {
            $bobot1->update([
                'nilai_banding' => $request->nilai_banding,
                'alternatif1' => $request->alternatif1,
                'alternatif2' => $request->alternatif2,
            ]);
        }
        // dd($bobot1);
        return redirect()->route('NilaiBobotAlternatif.index', ['kode' => $request->kriteria_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNilaiBobotAlternatifRequest  $request
     * @param  \App\Models\NilaiBobotAlternatif  $nilaiBobotAlternatif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode)
    {
        $this->store($kode);
        $bobot['bobot'] = NilaiBobotAlternatif::where('kriteria_id', '=', $kode)->get();
        $bobot['alternatif'] = Alternatif::all();
        return response()->json($bobot);
    }
    public function getBobotAlternatif($kode, $alternatif1, $alternatif2)
    {
        $bobot1 = NilaiBobotAlternatif::where('kriteria_id', '=', $kode)
            ->where('alternatif1', '=', $alternatif1)
            ->where('alternatif2', '=', $alternatif2)
            ->first();

        return response()->json($bobot1->nilai_banding);
    }
    public function getBobotAlternatif2($kode, $alternatif1, $alternatif2)
    {
        $bobot1 = NilaiBobotAlternatif::where('kriteria_id', '=', $kode)
            ->where('alternatif2', '=', $alternatif1)
            ->where('alternatif1', '=', $alternatif2)
            ->first();

        return response()->json($bobot1->nilai_banding);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NilaiBobotAlternatif  $nilaiBobotAlternatif
     * @return \Illuminate\Http\Response
     */
    public function destroy(NilaiBobotAlternatif $nilaiBobotAlternatif)
    {
        //
    }

    public function NilaiBobotAlternatif($kode, $alternatif1, $alternatif2)
    {
        $alternatif = NilaiBobotAlternatif::where('kriteria_id', '=', $kode)->where('alternatif1', '=', $alternatif1)
            ->where('alternatif2', '=', $alternatif2)
            ->first();
        return $alternatif->nilai_banding;
    }
    /**
     * NilaiBobotAlternatif2
     *  Mendapatkan Nilai Banding Dari NilaiBobotAlternatif
     * @param  mixed $kode
     * @param  mixed $alternatif1
     * @param  mixed $alternatif2
     * @return void
     */
    public function NilaiBobotAlternatif2($kode, $alternatif1, $alternatif2)
    {
        $alternatif = NilaiBobotAlternatif::where('kriteria_id', '=', $kode)->where('alternatif2', '=', $alternatif1)
            ->where('alternatif1', '=', $alternatif2)
            ->first();
        return $alternatif->nilai_banding;
    }

    /**
     * GetKriteria
     *  Mendapatkan Kode Kriteria
     * @return void
     */
    public function GetKriteria()
    {
        $kriteria = Kriteria::all();
        $kode_kriteria = array();
        foreach ($kriteria as $item => $val) {
            $kode_kriteria[$item] = $val->kode;
        }
        return $kode_kriteria;
    }
    /**
     * MatrixAHP
     *  Pembuatan Matrix
     *  Bobot
     *  Prioritas
     *  Untuk Alternatif
     * @param  mixed $kode
     * @return void
     */
    public function MatrixAHP($kode)
    {
        // $kode_kriteria = $this->GetKriteria();
        $alternatif = Alternatif::all()->toArray();
        // $NilaiAlternatif = NilaiBobotAlternatif::all()->toArray();
        $batas = count($alternatif);
        $matrix = array();
        $matrix_bobot = array();
        $nama_alternatif = array();
        // $nilai_Matrix = array();

        for ($i = 0; $i < $batas; $i++) {
            $matrix['alternatif'][$i] = [$i];
            $matrix['Matrix_alternatif'][$i] = [$i];
            $matrix_bobot[$i] = [$i];
            $matrix['nama_table'][$i] = $alternatif[$i];
        }
        // for ($i = 0; $i < count($kode_kriteria); $i++) {
        //     $nilai_Matrix[$kode_kriteria[$i]] = [$i];
        // }

        for ($baris = 0; $baris < $batas; $baris++) {
            for ($kolom = 0; $kolom < $batas; $kolom++) {
                if ($baris == $kolom) {
                    // Perbandingan
                    $matrix['Matrix_alternatif'][$baris][$kolom] = 1;
                    $matrix['alternatif'][$baris][$kolom] = 1;
                    $matrix_bobot[$baris][$kolom] = 1;
                } else {
                    if ($baris < $kolom) {
                        // Perbandingan
                        $nilai = $this->NilaiBobotAlternatif($kode, $alternatif[$baris]['kode'], $alternatif[$kolom]['kode']);
                        $matrix['alternatif'][$baris][$kolom] = $nilai;
                        $matrix_bobot[$kolom][$baris] = $nilai;
                    } else {
                        // Perbandingan
                        $nilai = $this->NilaiBobotAlternatif($kode, $alternatif[$baris]['kode'], $alternatif[$kolom]['kode']);
                        $nilai2 = $this->NilaiBobotAlternatif2($kode, $alternatif[$baris]['kode'], $alternatif[$kolom]['kode']);
                        $matrix['alternatif'][$baris][$kolom] = $nilai / $nilai2;
                        $matrix_bobot[$kolom][$baris] = $nilai / $nilai2;
                    }
                }
            }
        }
        // Matrix Bobot
        for ($i = 0; $i < $batas; $i++) {
            $matrix['bobot'][$i] = array_sum($matrix_bobot[$i]);
        }
        // Matrix Prioritas
        for ($baris = 0; $baris < $batas; $baris++) {
            for ($kolom = 0; $kolom < $batas; $kolom++) {
                if ($baris == $kolom) {
                    // Perbandingan
                    $matrix['Matrix_alternatif'][$baris][$kolom] = $this->FormatNumber(1 / $matrix['bobot'][$kolom]);
                } else {
                    if ($baris < $kolom) {
                        $matrix['Matrix_alternatif'][$baris][$kolom] = $this->FormatNumber($matrix_bobot[$kolom][$baris] / $matrix['bobot'][$kolom]);
                    } else {
                        $matrix['Matrix_alternatif'][$baris][$kolom] = $this->FormatNumber($matrix_bobot[$kolom][$baris] / $matrix['bobot'][$kolom]);
                    }
                }
            }
        }
        for ($baris = 0; $baris < $batas; $baris++) {
            for ($kolom = 0; $kolom < $batas; $kolom++) {
                if ($baris == $kolom) {
                    // Perbandingan
                    $matrix['prioritas'][$baris][$kolom] = $this->FormatNumber($matrix['Matrix_alternatif'][$baris][$kolom]);
                } else {
                    if ($baris < $kolom) {
                        $matrix['prioritas'][$baris][$kolom] = $this->FormatNumber($matrix['Matrix_alternatif'][$baris][$kolom]);
                    } else {
                        $matrix['prioritas'][$baris][$kolom] = $this->FormatNumber($matrix['Matrix_alternatif'][$baris][$kolom]);
                    }
                }
            }
        }
        for ($i = 0; $i < $batas; $i++) {
            $matrix['bobot_prioritas'][$i] = array_sum($matrix['prioritas'][$i]) / $batas;
        }
        return $matrix;
    }
    /**
     * BobotAHP
     * Pencarian Bobot Nilai Alternatif Berdasarkan Kode Kriteria
     * @return void
     */
    public function BobotAHP()
    {
        $kode_kriteria = $this->GetKriteria();
        $Hasil_bobot = array();
        $batas = count($kode_kriteria);
        for ($i = 0; $i < $batas; $i++) {
            $Hasil_bobot[$kode_kriteria[$i]] = $this->MatrixAHP($kode_kriteria[$i]);
        }
        // $Matrix_alternatif =  $this->MatrixAHP("C01");
        return $Hasil_bobot;
    }
    private function FormatNumber($value, $num = 4)
    {
        return number_format($value, $num);
    }


    /**
     * GetVector
     *  Penilaian Akhir alternatif Dengan Perbandingan Dari Hasil Prioritas Alternatif
     * @param  mixed $kode
     * @return void
     */
    public function GetVector($kode)
    {
        $kriteria = $this->GetKriteria();
        $alternatif = Alternatif::all()->toArray();
        $batas = count($alternatif);
        $batas_kriteria = count($alternatif);
        $matrix = $this->MatrixAHP($kode);
        $Nilai['bobot'] = $matrix['bobot_prioritas'];
        $Nilai['akhir'] = array_sum($Nilai['bobot']) / count($alternatif);

        return  $Nilai['akhir'];
    }

    public function NilaiAKhir()
    {
        $kriteria = Kriteria::all();
        $alternatif = Alternatif::all()->toArray();
        $Matrix = array();
        $alternatif_matrix = [];
        $batas = count($alternatif);
        $rangking = array();
        foreach ($kriteria as $item => $val) {
            $alternatif_matrix['kriteria_id'][$item] = $val;
            $Matrix[$item] = $this->MatrixAHP($val->kode)['bobot_prioritas'];
            $Matrix['sum'][$item] = [$item];
        }
        for ($i = 0; $i < $batas; $i++) {
            // Masukkan Kode Nilai Alternatif
            $alternatif_matrix['nilai'][$i] = [$alternatif[$i]['kode']];
            // array_push($alternatif_matrix['nilai'][$i], [$i]);
            $rangking['kode'][$i] = ['kode' => $alternatif[$i]['kode']];
        }
        for ($baris = 0; $baris < count($alternatif); $baris++) {
            for ($kolom = 0; $kolom < $kriteria->count(); $kolom++) {
                $matr['matrix'][$kolom] = $Matrix[$kolom][$baris];
                // Masukkan Nilai Matrix
                $rangking['matrix'][$baris][$kolom] =  $Matrix[$kolom][$baris];
                // $rangking['matrix'][$baris]= $Matrix[$kolom][$baris];
                // array_push($rangking[$baris], $Matrix[$kolom][$baris]);
                array_push($alternatif_matrix['nilai'][$baris], $Matrix[$kolom][$baris]);
            }
        }
        // dd($rangking['matrix']);
        $DB_matrix = new NilaiMatrixController();
        for ($i = 0; $i < $batas; $i++) {
            $rangking['ranking'][$i] = number_format(array_sum($alternatif_matrix['nilai'][$i]), 4) / $kriteria->count();
        }
        // for ($i = 0; $i < count($alternatif); $i++) {
        // }
        for ($i = 0; $i < count($alternatif); $i++) {
            $data[$i] = array(
                'kode' => $rangking['kode'][$i],
                'matrix' => $rangking['matrix'][$i],
                'ranking' => $rangking['ranking'][$i],
            );
            // for ($k = 0; $k < count($kriteria); $k++) {
            //     $data['matrix'][$k][$i] = $rangking['matrix'][$k];;
            // }
            $DB_matrix->create($data[$i]);
        }

        // dd($data);


        return $rangking;
    }

    public function hasilAlternatif()
    {
        $matrix = NilaiMatrix::orderBy('ranking', 'desc')->get();
        return $matrix;
    }
}
