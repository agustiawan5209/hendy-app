<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\NilaiBobotAlternatif;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreKriteriaRequest;
use App\Http\Requests\UpdateKriteriaRequest;
use App\Http\Controllers\NilaiBobotKriteriaController;
use App\Models\NilaiBobotKriteria;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = Kriteria::orderBy('kode', 'asc')->get();
        return view('admin.kriteria.index', [
            'kriteria'=> $kriteria,
            'kode'=> $this->createCode()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKriteriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKriteriaRequest $request)
    {
        // dd($request->all());
        $kriteria = Kriteria::create([
            'kode'=> $request->kode,
            'name'=> $request->name,
        ]);
        // Tambah Sub Kriteria
        $subKriteria = new SubKriteriaController();
        $subKriteria->store($request->subkriteria, $kriteria->id);
        // Tambah NilaiBobotKriteriaController
        $tbKriteria = new NilaiBobotKriteriaController();
        $tbKriteria->store($request->kode);
        // Tambah NilaiBobotAlternatifController
        $tbKriteria = new NilaiBobotAlternatifController();
        $tbKriteria->store();
        Alert::success('Info', 'Berhasil Di Tambah');
        return redirect()->route('Kriteria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Kriteria $kriteria, $id)
    {
        $data = $kriteria->find($id);
        return view('admin.kriteria.form', [
            'kriteria'=> $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKriteriaRequest  $request
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKriteriaRequest $request, Kriteria $kriteria, $id)
    {
        // dd($request->all());
        $kriteria->find($id)->update([
            'kode'=> $request->kode,
            'name'=> $request->name,
        ]);
         // Tambah Sub Kriteria
         $subKriteria = new SubKriteriaController();
         $subKriteria->store($request->subkriteria, $id);
        Alert::success('Info', 'Berhasil Di Update');
        return redirect()->route('Kriteria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kriteria $kriteria,$id)
    {
        $data = $kriteria->find($id);
        NilaiBobotAlternatif::where('kriteria_id', $data->kode)->delete();
        NilaiBobotKriteria::where('kriteria1', $data->kode)->orWhere('kriteria2', $data->kode)->delete();
        $data->delete();
    }
    private function createCode()
    {
        $alternatif = Kriteria::max('kode');
        if ($alternatif == null) {
            $kode = "C01";
        } else {
            $parse_kode = substr($alternatif, 1, 2);
            $parse_kode++;
            $huruf = "C";
            $kode = sprintf($huruf ."%02s",  $parse_kode);
        }
        return $kode;
    }
}
