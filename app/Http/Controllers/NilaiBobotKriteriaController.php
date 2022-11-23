<?php

namespace App\Http\Controllers;

use App\Models\NilaiBobotKriteria;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreNilaiBobotKriteriaRequest;
use App\Http\Requests\UpdateNilaiBobotKriteriaRequest;
use App\Models\Kriteria;
use App\Models\NilaiPrefensi;

class NilaiBobotKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bobot = NilaiBobotKriteria::all();
        $kriteria = Kriteria::with(['kriteria1', 'kriteria2'])->get()->toArray();
        // dd($kriteria);
        $prefensi = NilaiPrefensi::all();
        return view('admin.nilaibobotkriteria.index', [
            'bobot' => $bobot,
            'kriteria'=> $kriteria,
            'prefensi'=> $prefensi,
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
        if($nilai == null){
            $kode= "B01";
        }else{
            $spr = substr($nilai, 1,2);
            $spr++;
            $kode = sprintf($kode. '%02s', $spr);
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
        NilaiBobotKriteria::create([
            'kode' => $this->createKode(),
            'nilai_banding' => '1',
            'kriteria1' => $kriteria_id,
            'kriteria2' => $kriteria_id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NilaiBobotKriteria  $nilaiBobotKriteria
     * @return \Illuminate\Http\Response
     */
    public function show(NilaiBobotKriteria $nilaiBobotKriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NilaiBobotKriteria  $nilaiBobotKriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(NilaiBobotKriteria $nilaiBobotKriteria, $id)
    {
        $data = $nilaiBobotKriteria->find();
        return view('admin.nilaibobotalternatif.form', [
            'bobot' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNilaiBobotKriteriaRequest  $request
     * @param  \App\Models\NilaiBobotKriteria  $nilaiBobotKriteria
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNilaiBobotKriteriaRequest $request, NilaiBobotKriteria $nilaiBobotKriteria, $id)
    {
        $nilaiBobotKriteria->find($id)->update([
            'kode' => $request->kode,
            'nilai_banding' => $request->nilai_banding,
            'kriteria1' => $request->kriteria1,
            'kriteria2' => $request->kriteria2,
        ]);
        Alert::success('Info', 'Berhasil Di Update');
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
}
