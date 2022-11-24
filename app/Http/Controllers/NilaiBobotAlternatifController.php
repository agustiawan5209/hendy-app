<?php

namespace App\Http\Controllers;

use App\Models\NilaiBobotAlternatif;
use App\Http\Requests\StoreNilaiBobotAlternatifRequest;
use App\Http\Requests\UpdateNilaiBobotAlternatifRequest;
use App\Models\Alternatif;
use App\Models\NilaiPrefensi;

class NilaiBobotAlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alternatif = Alternatif::all()->toArray();
        $prefensi = NilaiPrefensi::all();
        return view('admin.nilaibobotalternatif.index', [
            'alternatif'=> $alternatif,
            'prefensi'=> $prefensi,
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
     * @param  \App\Http\Requests\StoreNilaiBobotAlternatifRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNilaiBobotAlternatifRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NilaiBobotAlternatif  $nilaiBobotAlternatif
     * @return \Illuminate\Http\Response
     */
    public function show(NilaiBobotAlternatif $nilaiBobotAlternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NilaiBobotAlternatif  $nilaiBobotAlternatif
     * @return \Illuminate\Http\Response
     */
    public function edit(NilaiBobotAlternatif $nilaiBobotAlternatif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNilaiBobotAlternatifRequest  $request
     * @param  \App\Models\NilaiBobotAlternatif  $nilaiBobotAlternatif
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNilaiBobotAlternatifRequest $request, NilaiBobotAlternatif $nilaiBobotAlternatif)
    {
        //
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
}
