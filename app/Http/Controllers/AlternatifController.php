<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\NilaiMatrix;
use Illuminate\Http\Request;
use App\Models\NilaiBobotAlternatif;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreAlternatifRequest;
use App\Http\Requests\UpdateAlternatifRequest;
use App\Http\Controllers\NilaiBobotAlternatifController;

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
            'alternatif' => $alternatif,
            'kode'=> $this->createCode(),
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
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);
        $lokasi = new LokasiController();
        $lokasi->store($request, $alternatif->id);
        $tbKriteria = new NilaiBobotAlternatifController();
        $tbKriteria->store();
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
            'alternatif' => $data,
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
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);
        $lokasi = new LokasiController();
        $lokasi->update($request, $id);
        $nilai = new NilaiBobotAlternatifController();
        $nilai->store();
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

    private function createCode()
    {
        $alternatif = ALternatif::max('kode');
        if ($alternatif == null) {
            $kode = "A01";
        } else {
            $parse_kode = substr($alternatif, 1, 2);
            $parse_kode++;
            $huruf = "A";
            $kode = sprintf($huruf ."%02s",  $parse_kode);
        }
        return $kode;
    }
}
