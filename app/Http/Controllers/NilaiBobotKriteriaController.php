<?php

namespace App\Http\Controllers;

use App\Models\NilaiBobotKriteria;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreNilaiBobotKriteriaRequest;
use App\Http\Requests\UpdateNilaiBobotKriteriaRequest;
use App\Models\Kriteria;
use App\Models\NilaiPrefensi;
use Illuminate\Http\Request;

class NilaiBobotKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bobot = NilaiBobotKriteria::with(['datakriteria1', 'datakriteria2'])->get();
        $kriteria = Kriteria::with(['kriteria1', 'kriteria2'])->get()->toArray();
        // dd($kriteria);
        $prefensi = NilaiPrefensi::all();
        return view('admin.nilaibobotkriteria.index', [
            'bobot' => $bobot,
            'kriteria' => $kriteria,
            'prefensi' => $prefensi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createKode()
    {
        $nilai = NilaiBobotKriteria::max('kode');
        $kode = "B";
        if ($nilai == null) {
            $kode = "B01";
        } else {
            $spr = substr($nilai, 1, 2);
            $spr++;
            $kode = sprintf($kode . '%02s', $spr);
        }
        return $kode;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNilaiBobotKriteriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($kriteria_id)
    {
        $kriteria = Kriteria::all()->toArray();
        // dd($kriteria);
        if (count($kriteria) > 0) {
            for ($k = 0; $k < count($kriteria); $k++) {
                for ($i = 0; $i < count($kriteria); $i++) {
                    $nilai_kode = $this->createKode();
                    // dd($kriteria[$k]);
                    $bobot1 = NilaiBobotKriteria::where('kriteria1', '=', $kriteria[$k]['kode'])
                        ->where('kriteria2', '=', $kriteria[$i]['kode'])
                        ->get();
                    if ($bobot1->count() < 1) {
                        NilaiBobotKriteria::insert([
                            [
                                'kode' => $nilai_kode,
                                'nilai_banding' => '1',
                                'kriteria1' => $kriteria[$k]['kode'],
                                'kriteria2' => $kriteria[$i]['kode'],
                            ],
                        ]);
                    }
                }
            }
        } else {
            NilaiBobotKriteria::create([
                'kode' => $this->createKode(),
                'nilai_banding' => '1',
                'kriteria1' => $kriteria_id,
                'kriteria2' => $kriteria_id,
            ]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNilaiBobotKriteriaRequest  $request
     * @param  \App\Models\NilaiBobotKriteria  $nilaiBobotKriteria
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNilaiBobotKriteriaRequest $request, NilaiBobotKriteria $nilaiBobotKriteria)
    {
        if ($request->kriteria1 == $request->kriteria2) {
            $bobot = 1;
            Alert::success('Info', 'Berhasil Di Update');
        } else {
            $bobot = $nilaiBobotKriteria->where('kriteria1', '=', $request->kriteria1)
                ->where('kriteria2', '=', $request->kriteria2)
                ->first();
            // dd($bobot);
            if ($bobot == null) {
                $nilaiBobotKriteria->create([
                    'kode' => $this->createKode(),
                    'nilai_banding' => $request->nilai_banding,
                    'kriteria1' => $request->kriteria1,
                    'kriteria2' => $request->kriteria2,
                ]);
                Alert::success('Info', 'Berhasil Di Tambah');
            } else {
                $nilaiBobotKriteria->find($bobot->id)->update([
                    'nilai_banding' => $request->nilai_banding,
                    'kriteria1' => $request->kriteria1,
                    'kriteria2' => $request->kriteria2,
                ]);
                Alert::success('Info', 'Berhasil Di Update');
            }
        }

        return redirect()->route('NilaiBobotKriteria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NilaiBobotKriteria  $nilaiBobotKriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(NilaiBobotKriteria $nilaiBobotKriteria, $id)
    {
        $data = $nilaiBobotKriteria->find($id);
        $data->delete();
    }

    public function GetKriteria()
    {
        $data['kriteria'] = Kriteria::all();
        $data['bobot'] = NilaiBobotKriteria::all();
        return response()->json($data);
    }

    public function getNilaiBobotKriteria($kriteria1, $kriteria2)
    {
        $kriteria = NilaiBobotKriteria::where('kriteria1', '=', $kriteria1)
            ->where('kriteria2', '=', $kriteria2)
            ->first();
        return response()->json($kriteria->nilai_banding);
    }
    public function getNilaiBobotKriteria2($kriteria1, $kriteria2)
    {
        $kriteria = NilaiBobotKriteria::where('kriteria2', '=', $kriteria1)
            ->where('kriteria1', '=', $kriteria2)
            ->first();
        return response()->json($kriteria->nilai_banding);
    }
    public function NilaiBobotKriteria($kriteria1, $kriteria2)
    {
        $kriteria = NilaiBobotKriteria::where('kriteria1', '=', $kriteria1)
            ->where('kriteria2', '=', $kriteria2)
            ->first();
        return $kriteria->nilai_banding;
    }
    public function NilaiBobotKriteria2($kriteria1, $kriteria2)
    {
        $kriteria = NilaiBobotKriteria::where('kriteria2', '=', $kriteria1)
            ->where('kriteria1', '=', $kriteria2)
            ->first();
        return $kriteria->nilai_banding;
    }

    public function MatrixAHP()
    {
        $kriteria = Kriteria::all()->toArray();
        $bobot = NilaiBobotKriteria::all()->toArray();
        $batas = count($kriteria);
        $Matrix = array($batas);
        for ($i = 0; $i < $batas; $i++) {
            $Matrix['kriteria'][$i] = [$i];
            $Matrix['bobot'][$i] = [$i];
        }
        for ($baris = 0; $baris < $batas; $baris++) {
            for ($kolom = 0; $kolom < $batas; $kolom++) {
                if ($baris == $kolom) {
                    $Matrix['kriteria'][$baris][$kolom] = 1;
                } else {
                    $kriteria_1 = 0;
                    $kriteria_2 = 0;
                    if ($baris < $kolom) {
                        $kriteria_1 = $this->NilaiBobotKriteria($kriteria[$baris]['kode'], $kriteria[$kolom]['kode']);
                        $Matrix['kriteria'][$baris][$kolom] = $kriteria_1;
                    } else {
                        $kriteria_1 = $this->NilaiBobotKriteria($kriteria[$baris]['kode'], $kriteria[$kolom]['kode']);
                        $kriteria_2 = $this->NilaiBobotKriteria2($kriteria[$baris]['kode'], $kriteria[$kolom]['kode']);
                        $Matrix['kriteria'][$baris][$kolom] = $kriteria_1 / $kriteria_2;
                    }
                }
                $Matrix['bobot'][$kolom][$baris] = $Matrix['kriteria'][$baris][$kolom];
            }
        }
        for ($i = 0; $i < $batas; $i++) {
            $Matrix['bobot'][$i] = $this->FormatNumber(array_sum($Matrix['bobot'][$i]));
        }
        return $Matrix;
    }
    private function FormatNumber($value, $num = 3)
    {
        return round($value, $num);
    }
    public function PrioritasAHP()
    {
        $kriteria = Kriteria::all()->toArray();
        $bobot = NilaiBobotKriteria::all()->toArray();
        $batas = count($kriteria);
        $Matrix = array($batas);
        $Hasil_Matrix = $this->MatrixAHP();
        $jumlah = 0;
        for ($i = 0; $i < $batas; $i++) {
            $Matrix['matrix'][$i] = [$i];
            $Matrix['jumlah'][$i] = [$i];
            $Matrix['prioritas'][$i] = [$i];
            $Matrix['Hasil_kolom'][$i] = [$i];
        }
        for ($baris = 0; $baris < $batas; $baris++) {
            for ($kolom = 0; $kolom < $batas; $kolom++) {
                // Memasukkan nilai matrix dari setiap perbandingan kolom dan baris
                $Matrix['matrix'][$kolom][$baris] = $this->FormatNumber($Hasil_Matrix['kriteria'][$kolom][$baris] / $Hasil_Matrix['bobot'][$baris]);
                $Matrix['Hasil_kolom'][$baris][$kolom] = $this->FormatNumber($Hasil_Matrix['kriteria'][$kolom][$baris] / $Hasil_Matrix['bobot'][$baris]);
            }
            $Matrix['jumlah'][$baris] = $this->FormatNumber(array_sum($Matrix['Hasil_kolom'][$baris]));
        }
        // Memasukkan Nilai Prioritas Dari Masing-Masing Kriteria
        for ($i = 0; $i < $batas; $i++) {
            $Matrix['prioritas'][$i] = $this->FormatNumber(array_sum($Matrix['matrix'][$i]) / $batas);
        }
        return $Matrix;
    }

    public function ConsistencyMeasure()
    {
        $kriteria = Kriteria::all()->toArray();
        $bobot = NilaiBobotKriteria::all()->toArray();
        $batas = count($kriteria);
        $Matrix = array($batas);
        $Hasil_Matrix = $this->MatrixAHP();
        $F_prioritas = $this->PrioritasAHP();
        $Prioritas = $F_prioritas['prioritas'];
        $jumlah = 0;
        for ($i = 0; $i < $batas; $i++) {
            $Matrix['Hasil_CM'][$i] = [$i];
            $Matrix['Matrix_CM'][$i] = [$i];
            $Matrix['Jumlah_CM'][$i] = [$i];
        }
        for ($baris = 0; $baris < $batas; $baris++) {
            for ($kolom = 0; $kolom < $batas; $kolom++) {
                $Matrix['Matrix_CM'][$kolom][$baris] = $this->FormatNumber($Hasil_Matrix['kriteria'][$baris][$kolom] * $Prioritas[$kolom]);
                $Matrix['Jumlah_CM'][$baris][$kolom] = $this->FormatNumber($Hasil_Matrix['kriteria'][$baris][$kolom] * $Prioritas[$kolom]);
            }
        }
        for ($baris = 0; $baris < $batas; $baris++) {
            $Matrix['Hasil_CM'][$baris] = $this->FormatNumber(array_sum($Matrix['Jumlah_CM'][$baris]) / $Prioritas[$baris]);
        }
        return $Matrix;
    }

    public function RatioKonsistensi()
    {
        $kriteria = Kriteria::all()->toArray();
        $batas = count($kriteria);
        $konsistensi = $this->ConsistencyMeasure();
        $hasil_index = 0;
        $Prioritas = $this->PrioritasAHP()['prioritas'];
        $Nilai_total = array();
        // Rasio Index
        $Ratio_index = [0, 0, 0.58, 0.9, 1.12, 1.24, 1.32, 1.41, 1.46, 1.49, 1.51, 1.48, 1.56, 1.57, 1.59];
        for ($i = 0; $i < $batas; $i++) {
            $hasil_index = $Ratio_index[$i];
            $Nilai_total[$i] = $konsistensi['Hasil_CM'][$i] * $Prioritas[$i];
        }
        //
        $Matrix['prioritas'] = $Prioritas ;
        $Matrix['RT_CM'] = array_sum($konsistensi['Hasil_CM']) / $batas  ;
        // $Matrix['CI'] = $this->FormatNumber(($Matrix['RT_CM'] / $batas) / ($batas - 1));
        $Matrix['CI'] =($Matrix['RT_CM'] / $batas) / ($batas - 1);
        $Matrix['IR'] = $this->FormatNumber( $hasil_index/ $Matrix['CI']);
        $Matrix['Ratio_index'] = $hasil_index;
        $Matrix['CR'] = $this->FormatNumber($Matrix['CI'] / $hasil_index );
        $Matrix['Hasil'] = $Matrix['CI'] < $Matrix['IR'] || $Matrix['CR'] < $hasil_index ? 'Diterima' : 'Tidak Diterima';
        return $Matrix;
    }
}
