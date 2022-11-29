<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreAlternatifRequest;
use App\Http\Requests\UpdateAlternatifRequest;
use App\Models\NilaiBobotAlternatif;
use App\Models\NilaiMatrix;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alternatif = Alternatif::all();
        return view('admin.alternatif.index', [
            'alternatif'=> $alternatif
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
     * @param  \App\Http\Requests\StoreAlternatifRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlternatifRequest $request)
    {
       $alternatif = Alternatif::create([
            'kode'=> $request->kode,
            'nama'=> $request->nama,
        ]);
        $lokasi = new LokasiController();
        $lokasi->store($request, $alternatif->id);
        Alert::success('Info', 'Berhasil Di Tambah');
        return redirect()->route('Alternatif.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function show(Alternatif $alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function edit(Alternatif $alternatif, $id)
    {
        $data = $alternatif->find($id);
        return view('admin.alternatif.form', [
            'alternatif'=> $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlternatifRequest  $request
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlternatifRequest $request, Alternatif $alternatif, $id)
    {
        $alternatif->find($id)->update([
            'kode'=> $request->kode,
            'nama'=> $request->nama,
        ]);
        $lokasi = new LokasiController();
        $lokasi->update($request, $id);
        Alert::success('Info', 'Berhasil Di Update');
        return redirect()->route('Alternatif.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alternatif $alternatif, $id)
    {
        $data = $alternatif->find($id);
        NilaiBobotAlternatif::where('alternatif1', $data->kode)->orWhere('alternatif2', $data->kode)->delete();
        NilaiMatrix::where('kode', $data->kode)->delete();
        $data->delete();
    }
}
