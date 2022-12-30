<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KecamatanController extends Controller
{
    public function index()
    {
        $kecamatan = Kecamatan::all();
        return view('admin.kecamatan.index', [
            'kecamatan' => $kecamatan,
        ]);
    }

    public function create()
    {
        return view('admin.kecamatan.form', [
            'edit'=> false,
        ]);
    }
    public function edit($id)
    {
        $kecamatan = Kecamatan::find($id);
        return view('admin.kecamatan.form', [
            'edit'=> true,
            'Kecamatan'=> $kecamatan,
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'=> ['required', 'unique:kecamatans,nama,']
        ]);
        Kecamatan::create([
            'nama' => $request->nama,
        ]);
        Alert::success('Info', "Berhasil Di Simpan");
        return redirect()->route('Kecamatan.index');
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama'=> ['required', 'unique:kecamatans,nama,']
        ]);
        Kecamatan::find($id)->update([
            'nama' =>$request->nama,
        ]);
        Alert::success('Info', "Berhasil Di Edit");
        return redirect()->route('Kecamatan.index');
    }

    public function destroy($id)
    {
        Kecamatan::find($id)->delete();
        Alert::success('Info', "Berhasil Di Hapus");
        return redirect()->route('Kecamatan.index');
    }

}
