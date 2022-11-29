<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Http\Requests\StoreLokasiRequest;
use App\Http\Requests\UpdateLokasiRequest;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreLokasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request, $alternatif_id)
    {
        $gambar = $request->gambar->getClientOriginalName();
        $request->gambar->storeAs('public/lokasi/', $gambar);

        Lokasi::create([
            'alternatif_id' => $alternatif_id,
            'gambar' => $gambar,
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'pemilik' => $request->pemilik,
            'deskripsi' => $request->deskripsi,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function show(Lokasi $lokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Lokasi $lokasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLokasiRequest  $request
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function update($request, $alternatif_id)
    {
        $lokasi = Lokasi::where('alternatif_id', '=', $alternatif_id)->first();
        if ($request->gambar != null) {
            $gambar = $request->gambar->getClientOriginalName();
            $request->gambar->storeAs('public/lokasi/', $gambar);
        }else{
            $gambar = $lokasi->gambar;
        }
        Lokasi::where('alternatif_id', '=', $alternatif_id)->update([
            'gambar' => $gambar,
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'pemilik' => $request->pemilik,
            'deskripsi' => $request->deskripsi,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lokasi $lokasi)
    {
        //
    }
}
