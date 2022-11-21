@extends('page.layout')
@section('content')
    <div class="kecamatan">
        <h2><b>KECAMATAN DIKOTA MAKASSAR</b></h2>
    </div>

    <br>

    <div class="container mx-auto">
        @php
            $gambar = [
                '/img/1.jpg',
                '/img/2.jpg',
                '/img/7.png',
                '/img/18.png',
                '/img/9.png',
                '/img/10.png',
            ];
            $nama = [
                'Panakkukan',
                'Tamanlanrea'
            ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            @for ($i = 0; $i < 5; $i++)
            <div class="card col-span-1 bg-base-100 shadow-xl">
                <figure class="w-full"><img src="{{ $gambar[$i] }}" alt="Shoes" /></figure>
                <div class="card-body">
                  <h2 class="card-title">Shoes!</h2>
                  <p>If a dog chews shoes whose shoes does he choose?</p>
                  <div class="card-actions justify-end">
                    <button class="btn btn-primary">Buy Now</button>
                  </div>
                </div>
              </div>
            @endfor
        </div>
    </div>
@endsection
