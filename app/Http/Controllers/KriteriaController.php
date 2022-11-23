<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreKriteriaRequest;
use App\Http\Requests\UpdateKriteriaRequest;
use App\Http\Controllers\NilaiBobotKriteriaController;

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
        $kriteria = Kriteria::create([
            'kode'=> $request->kode,
            'name'=> $request->name,
        ]);
        $tbKriteria = new NilaiBobotKriteriaController();
        $tbKriteria->store($kriteria->id, );
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
        $kriteria->find($id)->update([
            'kode'=> $request->kode,
            'name'=> $request->name,
        ]);
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
        $data->delete();
    }
}
