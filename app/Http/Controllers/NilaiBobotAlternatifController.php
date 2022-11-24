<?php

namespace App\Http\Controllers;

use App\Models\NilaiBobotAlternatif;
use App\Http\Requests\StoreNilaiBobotAlternatifRequest;
use App\Http\Requests\UpdateNilaiBobotAlternatifRequest;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiPrefensi;
use Illuminate\Http\Request;

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
        $kriteria = Kriteria::all()->toArray();
        return view('admin.nilaibobotalternatif.index', [
            'alternatif' => $alternatif,
            'prefensi' => $prefensi,
            'kriteria' => $kriteria
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createKode()
    {
        $nilai = NilaiBobotAlternatif::max('kode');
        $kode = "NBA";
        if ($nilai == null) {
            $kode = "NBA01";
        } else {
            $spr = substr($nilai, 1, 2);
            $spr++;
            $kode = sprintf($kode . '%02s', $spr);
        }
        return $kode;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNilaiBobotAlternatifRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($kode)
    {
        $alternatif = Alternatif::all()->toArray();
        // dd($alternatif);
        if (count($alternatif) > 0) {
            for ($k = 0; $k < count($alternatif); $k++) {
                for ($i = 0; $i < count($alternatif); $i++) {
                    // dd($alternatif[$k]);
                    $bobot1 = NilaiBobotAlternatif::where('kriteria_id', '=', $kode)
                        ->where('alternatif1', '=', $alternatif[$k]['kode'])
                        ->where('alternatif2', '=', $alternatif[$i]['kode'])
                        ->get();
                    if ($bobot1->count() < 1) {
                        NilaiBobotAlternatif::insert([
                            [
                                'kode' => $this->createKode(),
                                'kriteria_id' => $kode,
                                'nilai_banding' => '1',
                                'alternatif1' => $alternatif[$k]['kode'],
                                'alternatif2' => $alternatif[$i]['kode'],
                            ],
                        ]);
                    }
                }
            }
        } else {
            NilaiBobotAlternatif::create([
                'kode' => $this->createKode(),
                'kriteria_id' => $kriteria_id,
                'nilai_banding' => '1',
                'alternatif1' => $request->alternatif1,
                'alternatif2' => $request->alternatif2,
            ]);
        }
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
    public function update(Request $request, $kode)
    {
        $this->store($kode);
        $bobot = NilaiBobotAlternatif::where('kriteria_id', '=', $kode)->get();
        return response()->json($bobot);
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
