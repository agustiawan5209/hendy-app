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

    public function GetKriteria(){
        $data['kriteria'] = Kriteria::all();
        $data['bobot'] = NilaiBobotKriteria::all();
        return response()->json($data);
    }

    public function getNilaiBobotKriteria($kriteria1,$kriteria2){
        $kriteria = NilaiBobotKriteria::where('kriteria1', '=', $kriteria1)
        ->where('kriteria2', '=', $kriteria2)
        ->first();
        return response()->json($kriteria->nilai_banding);
    }
    public function getNilaiBobotKriteria2($kriteria1,$kriteria2){
        $kriteria = NilaiBobotKriteria::where('kriteria2', '=', $kriteria1)
        ->where('kriteria1', '=', $kriteria2)
        ->first();
        return response()->json($kriteria->nilai_banding);
    }
}
