<?php

namespace App\Http\Controllers;

use App\Models\NilaiMatrix;
use Illuminate\Http\Request;

class NilaiMatrixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($data)
    {
        $exp = implode('/', $data['matrix']);
        // dd($exp);
        $nilai = NilaiMatrix::where('kode', '=', $data['kode'])->get();
        if ($nilai->count() < 1) {
            NilaiMatrix::create([
                'kode' => $data['kode'],
                'data' => $exp,
                'ranking' => $data['ranking'],
            ]);
        } else {
            NilaiMatrix::where('kode', '=', $data['kode'])->update([

                'data' => $exp,
                'ranking' => $data['ranking'],

            ]);
        }
    }
}
