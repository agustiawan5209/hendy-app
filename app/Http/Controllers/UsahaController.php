<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\NilaiMatrix;
use Illuminate\Http\Request;
use App\Models\SubAlternatif;
use App\Http\Requests\StoreUsahaRequest;
use App\Http\Requests\UpdateUsahaRequest;

class UsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = Kriteria::all();
        return view('page.info-usaha', [
            'kriteria' => $kriteria,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetAlternatif(Request $request)
    {
        $dataCari = $request->kode;
        // dd($dataCari);
        $alternatif = NilaiMatrix::all();
        for ($i = 0; $i < count($dataCari); $i++) {
            if ($dataCari[$i] != null) {
                $im = explode(',', $dataCari[$i]);
                // $alternatif = Alternatif::with(['subalternatif', 'lokasi'])->whereHas('subalternatif', function ($query) use ($im) {
                //     return $query->where('kriteria_kode', '=', $im[0])->where('sub_kriteria', '=', $im[1]);
                // })->whereHas('nilaiMatrix', function($query){
                //     return $query->orderBy('ranking', 'asc');
                // })->get();
                $alternatif=   NilaiMatrix::whereHas('alternatif', function($query) use($im){
                    return $query->with(['subalternatif', 'lokasi'])->whereHas('subalternatif', function ($query) use ($im) {
                        return $query->where('kriteria_kode', '=', $im[0])->where('sub_kriteria', '=', $im[1]);
                    });
                })->orderBy('ranking', 'desc')->get();
            }
        }
        // dd($alternatif);
        $kriteria = Kriteria::all();
        return view('page.info-usaha', [
            'kriteria' => $kriteria,
            'NilaiM' => $alternatif,
        ]);
    }
    public function create(Request $request)
    {
        $kriteria = Kriteria::all();
        return view('page.info-usaha', [
            'kriteria' => $kriteria,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUsahaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsahaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alternatif = Alternatif::find($id);
        return view('page.detail-usaha', [
            'alternatif'=> $alternatif,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function edit(Usaha $usaha)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsahaRequest  $request
     * @param  \App\Models\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsahaRequest $request, Usaha $usaha)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usaha $usaha)
    {
        //
    }
}
