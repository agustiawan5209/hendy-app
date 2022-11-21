@extends('page.layout')
@section('content')
    <div class="grid grid-cols-4 md:grid-cols-4 lg:grid-cols-7">
        <select class="select text-white" id="inputGroupSelect"
            aria-label="Example select with button addon"style="background-color:	#2F4F4F">
            <option selected>LUAS LAHAN</option>
            <option value="1">2*3</option>
            <option value="2">3*4</option>
            <option value="3">4*5</option>
        </select>
        <select class="select text-white" id="inputGroupSelect01"
            aria-label="Example select with button addon"style="background-color:	#2F4F4F">
            <option selected>BIAYA SEWA TEMPAT</option>
            <option value="1">Rp. 500.000</option>
            <option value="2">Rp. 500.000-1.000.000</option>
            <option value="3">Rp. 1.000.000-1.500.000</option>
        </select>
        <select class="select text-white" id="inputGroupSelect02"
            aria-label="Example select with button addon"style="background-color:	#2F4F4F">
            <option selected>KETERSEDIAAN LISTRIK</option>
            <option value="1">250 VA</option>
            <option value="2">450 VA</option>
            <option value="3">900 VA</option>
        </select>
        <select class="select text-white" id="inputGroupSelect03"
            aria-label="Example select with button addon"style="background-color:	#2F4F4F">
            <option selected>KETERSEDIAAN AIR</option>
            <option value="1">ADA</option>
            <option value="2">TIDAK ADA</option>
        </select>
        <select class="select text-white" id="inputGroupSelect03"
            aria-label="Example select with button addon"style="background-color:	#2F4F4F">
            <option selected>KEPADATAN PENDUDUK</option>
            <option value="1">RENDAH</option>
            <option value="2">SEDANG</option>
            <option value="3">TINGGI</option>
        </select>
        <select class="select text-white" id="inputGroupSelect03"
            aria-label="Example select with button addon"style="background-color:	#2F4F4F">
            <option selected>JARAK DGN INSTANSI</option>
            <option value="1">100 M</option>
            <option value="2">200 M</option>
            <option value="3">300 M</option>
            <option value="4">400 M</option>
        </select>
        <select class="select text-white" id="inputGroupSelect03"
            aria-label="Example select with button addon"style="background-color:	#2F4F4F">
            <option selected>PESAING</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
    </div>
    <br>
    <div class="flex justify-center items-center">
        <div class="w-96">
            <button class="btn btn-primary text-white hover:text-gray-100 w-full" type="button">CARI</button>
        </div>
    </div>
@endsection
