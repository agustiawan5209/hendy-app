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
use App\Models\NilaiBobotKriteria;
use App\Models\NilaiMatrix;

class NilaiBobotAlternatifController extends Controller
{
    public function __construct()
    {
        $this->NilaiAKhir();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $alternatif = Alternatif::orderBy('kode', 'asc')->get()->toArray();
        $prefensi = NilaiPrefensi::orderBy('kode', 'asc')->get();
        $kriteria = Kriteria::orderBy('kode', 'asc')->get()->toArray();
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
    public function store()
    {
        $alternatif = Alternatif::all()->toArray();
        $kriteria = Kriteria::all();
        // dd($alternatif);
        if($kriteria->count() > 0){
            foreach ($kriteria as $item){
                if (count($alternatif) > 0) {
                    $nilai_kode = $this->createKode();
                    for ($k = 0; $k < count($alternatif); $k++) {
                        for ($i = 0; $i < count($alternatif); $i++) {
                            // dd($alternatif[$k]);
                            $bobot1 = NilaiBobotAlternatif::where('kriteria_id', '=', $item->kode)
                                ->where('alternatif1', '=', $alternatif[$k]['kode'])
                                ->where('alternatif2', '=', $alternatif[$i]['kode'])
                                ->get();
                            if ($bobot1->count() < 1) {
                                NilaiBobotAlternatif::insert([
                                    [
                                        'kode' => $nilai_kode,
                                        'kriteria_id' => $item->kode,
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

        return $bobot1 == null ? 0 : response()->json($bobot1->nilai_banding);
    }
    public function getBobotAlternatif2($kode, $alternatif1, $alternatif2)
    {
        $bobot1 = NilaiBobotAlternatif::where('kriteria_id', '=', $kode)
            ->where('alternatif2', '=', $alternatif1)
            ->where('alternatif1', '=', $alternatif2)
            ->first();

        return $bobot1 == null ? 0 : response()->json($bobot1->nilai_banding);
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
        return $alternatif == null ? 0 : $alternatif->nilai_banding;
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
        return $alternatif == null ? 0 : $alternatif->nilai_banding;
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
        $NilaiAlternatif = NilaiBobotAlternatif::all()->toArray();
        $Cari_kd = NilaiBobotAlternatif::where('kriteria_id', $kode)->get();
        // dd($Cari_kd);
        $this->store($kode);
        $batas = count($alternatif);
        $matrix = array();
        $matrix_bobot = array();

        if (count($NilaiAlternatif) > 0 && $Cari_kd->count() > 0) {
            for ($i = 0; $i < $batas; $i++) {
                $matrix['alternatif'][$i] = [$i];
                $matrix['Matrix_alternatif'][$i] = [$i];
                $matrix_bobot[$i] = [$i];
                $matrix['nama_table'][$i] = $alternatif[$i];
            }
            // dd($kode);
            for ($baris = 0; $baris < $batas; $baris++) {
                for ($kolom = 0; $kolom < $batas; $kolom++) {
                    // Hasil Perbandingan Nilai Matriks
                    if ($baris == $kolom) {
                        // Perbandingan
                        $matrix['Matrix_alternatif'][$baris][$kolom] = 1;
                        $matrix['alternatif'][$baris][$kolom] = 1;
                        $matrix_bobot[$baris][$kolom] = 1;
                    } else {
                        if ($baris < $kolom) {
                            // Perbandingan
                            $nilai = $this->NilaiBobotAlternatif($kode, $alternatif[$baris]['kode'], $alternatif[$kolom]['kode']);
                            $nilai2 = $this->NilaiBobotAlternatif2($kode, $alternatif[$baris]['kode'], $alternatif[$kolom]['kode']);
                            $hasil = ($nilai / $nilai2);
                            $matrix['alternatif'][$baris][$kolom] = $this->FormatNumber($hasil);
                            $matrix_bobot[$kolom][$baris] = $this->FormatNumber($hasil);
                        } else {
                            // Perbandingan
                            $nilai = $this->NilaiBobotAlternatif($kode, $alternatif[$baris]['kode'], $alternatif[$kolom]['kode']);
                            $nilai2 = $this->NilaiBobotAlternatif2($kode, $alternatif[$baris]['kode'], $alternatif[$kolom]['kode']);
                            $matrix['alternatif'][$baris][$kolom] = $this->FormatNumber($nilai / $nilai2);
                            $matrix_bobot[$kolom][$baris] = $this->FormatNumber($nilai / $nilai2);
                        }
                    }
                }
            }
            // Matrix Bobot
            for ($i = 0; $i < $batas; $i++) {
                $matrix['bobot'][$i] = $this->FormatNumber(array_sum($matrix_bobot[$i]));
            }
            // Matrix Prioritas
            for ($baris = 0; $baris < $batas; $baris++) {
                for ($kolom = 0; $kolom < $batas; $kolom++) {
                    // Pembagian Nilai Bobot
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
                        // Nilai Bobot Hasil Pembagian
                        if ($baris < $kolom) {
                            $matrix['prioritas'][$baris][$kolom] = $this->FormatNumber($matrix['Matrix_alternatif'][$baris][$kolom]);
                        } else {
                            $matrix['prioritas'][$baris][$kolom] = $this->FormatNumber($matrix['Matrix_alternatif'][$baris][$kolom]);
                        }
                    }
                }
            }
            // Nilai Bobot Prioritas

            for ($i = 0; $i < $batas; $i++) {
                $matrix['bobot_prioritas'][$i] = $this->FormatNumber(array_sum($matrix['prioritas'][$i]) / $batas);
            }
        } else {
            for ($i = 0; $i < $batas; $i++) {
                $matrix['bobot_prioritas'][$i] = 1;
            }
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
        $kriteria = Kriteria::all();
        $Hasil_bobot = array();
        $batas = count($kode_kriteria);
        for ($i = 0; $i < $batas; $i++) {
            $Hasil_bobot[$kode_kriteria[$i]] = $this->MatrixAHP($kode_kriteria[$i]);
        }
        // $Matrix_alternatif =  $this->MatrixAHP("C01");
        $this->NilaiAKhir();
        return $Hasil_bobot;
    }
    private function FormatNumber($value, $num = 3)
    {
        return round($value, $num);
    }


    /**
     * GetVector
     *  Penilaian Akhir alternatif Dengan Perbandingan Dari Hasil Prioritas Alternatif
     * @param  mixed $kode
     * @return void
     */
    public function GetVector($kode)
    {
        $alternatif = Alternatif::all()->toArray();
        $batas = count($alternatif);
        $matrix = $this->MatrixAHP($kode);
        $Nilai['bobot'] = $matrix['bobot_prioritas'];
        $Nilai['akhir'] = $this->FormatNumber(array_sum($Nilai['bobot']) / count($alternatif));
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
        $C_prioritas_kriteria = new NilaiBobotKriteriaController();
        $Prioritas = $C_prioritas_kriteria->PrioritasAHP()['prioritas'];
        $hasil_kali_prioritas = array();
        $tableMalternatif = NilaiBobotAlternatif::all();
        if ($Prioritas != null && count($alternatif) > 0 && $tableMalternatif->count() > 0) {
            foreach ($kriteria as $item => $val) {
                $alternatif_matrix['kriteria_id'][$item] = $val;
                $MAHP = $this->MatrixAHP($val->kode);
                if ($MAHP == null) {
                    $Matrix[$item] = $this->MatrixAHP($val->kode);
                } else {
                    $Matrix[$item] = $this->MatrixAHP($val->kode)['bobot_prioritas'];
                    // $Matrix['sum'][$item] = [$item];
                }
            }
            for ($i = 0; $i < $batas; $i++) {
                // Masukkan Kode Nilai Alternatif
                $rangking['kode'][$i] = ['kode' => $alternatif[$i]['kode']];
                $rangking['nama'][$i] = $alternatif[$i]['nama'];
            }
            for ($baris = 0; $baris < count($alternatif); $baris++) {
                for ($kolom = 0; $kolom < $kriteria->count(); $kolom++) {
                    // $MAHP = $this->MatrixAHP($val->kode);
                    // Melakukan Perkalian Dengan Jumlah Bobot Alternatif kali Jumlah Prioritas Kriteria
                    $hasil_kali_prioritas[$baris][$kolom] = $Matrix[$kolom][$baris] * $Prioritas[$kolom];
                    // Masukkan Nilai Matrix
                    $rangking['matrix'][$baris][$kolom] =  $Matrix[$kolom][$baris];
                    // Memasukkan Nilai Dari Hasil Perkalian Setiap Kolom Dan Baris
                    $alternatif_matrix['nilai'][$baris] = $this->FormatNumber(array_sum($hasil_kali_prioritas[$baris]));
                }
            }
            // dd($rangking['matrix']);
            $DB_matrix = new NilaiMatrixController();
            for ($i = 0; $i < $batas; $i++) {
                $rangking['ranking'][$i] = $alternatif_matrix['nilai'][$i];
            }
            // Memasukkan Nilai Ke Database
            for ($i = 0; $i < count($alternatif); $i++) {
                $data[$i] = array(
                    'kode' => $rangking['kode'][$i],
                    'matrix' => $rangking['matrix'][$i],
                    'ranking' => $rangking['ranking'][$i],
                    'nama' => $rangking['nama'][$i],
                );
                $DB_matrix->create($data[$i]);
            }
        }
        return $rangking;
    }

    public function hasilAlternatif()
    {
        $matrix = NilaiMatrix::orderBy('ranking', 'desc')->get();
        return $matrix;
    }
}
