<?php

namespace App\Http\Controllers;

use App\Models\NilaiBobotKriteria;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreNilaiBobotKriteriaRequest;
use App\Http\Requests\UpdateNilaiBobotKriteriaRequest;

class NilaiBobotKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bobot = NilaiBobotKriteria::orderBy('kode', 'asc')->get();
        return view('admin.nilaibobotkriteria.index', [
            'bobot' => $bobot,
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
     * @param  \App\Http\Requests\StoreNilaiBobotKriteriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNilaiBobotKriteriaRequest $request)
    {
        NilaiBobotKriteria::create([
            'kode' => $request->kode,
            'nilai_banding' => $request->nilai_banding,
            'kriteria1' => $request->kriteria1,
            'kriteria2' => $request->kriteria2,
        ]);
        Alert::success('Info', 'Berhasil Di Tambah');
        return redirect()->route('NilaiBobotKriteria.index');
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
