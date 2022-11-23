<?php

namespace App\Http\Controllers;

use App\Models\NilaiPrefensi;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreNilaiPrefensiRequest;
use App\Http\Requests\UpdateNilaiPrefensiRequest;

class NilaiPrefensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilaiPrefensi = NilaiPrefensi::all();
        return view('admin.nilaiPrefensi.index', [
            'nilaiPrefensi'=> $nilaiPrefensi
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
     * @param  \App\Http\Requests\StoreNilaiPrefensiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNilaiPrefensiRequest $request)
    {
        NilaiPrefensi::create([
            'kode'=> $request->kode,
            'nama'=> $request->nama,
        ]);
        Alert::success('Info', 'Berhasil Di Tambah');
        return redirect()->route('nilaiPrefensi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NilaiPrefensi  $nilaiPrefensi
     * @return \Illuminate\Http\Response
     */
    public function show(NilaiPrefensi $nilaiPrefensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NilaiPrefensi  $nilaiPrefensi
     * @return \Illuminate\Http\Response
     */
    public function edit(NilaiPrefensi $nilaiPrefensi,$id)
    {
        $data = $nilaiPrefensi->find($id);
        return view('admin.nilaiPrefensi.form', [
            'nilaiPrefensi'=> $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNilaiPrefensiRequest  $request
     * @param  \App\Models\NilaiPrefensi  $nilaiPrefensi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNilaiPrefensiRequest $request, NilaiPrefensi $nilaiPrefensi,$id)
    {
        $nilaiPrefensi->find($id)->update([
            'kode'=> $request->kode,
            'nama'=> $request->nama,
        ]);
        Alert::success('Info', 'Berhasil Di Update');
        return redirect()->route('nilaiPrefensi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NilaiPrefensi  $nilaiPrefensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(NilaiPrefensi $nilaiPrefensi,$id)
    {
        $data = $nilaiPrefensi->find($id);
        $data->delete();
    }
}
