<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\NilaiMatrix;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $NilaiMatrix = NilaiMatrix::all();
        $alternatif = Alternatif::all();
        return view('welcome', [
            'alternatif' => $alternatif,
        ]);
    }
}
