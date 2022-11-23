@extends('page.layout')
@section('content')
    <div class="hero h-screen bg-cover" style="background-image: url('img/3.png'); background-attachment:fixed">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content  w-full !justify-around lg:flex-row-reverse text-left text-neutral-content">
            <img src="https://placeimg.com/260/400/arch" class="max-w-sm rounded-lg shadow-2xl wow slideInRight"
                data-wow-delay="300ms" data-wow-duration="1s" />
            <div class="max-w-full ">
                <h1 class="mb-5 text-6xl font-bold element wow fadeInLeftBig" data-wow-duration="1s">Selamat Datang!!</h1>
                <p class="mb-5 wow fadeInUp" data-wow-duration="1s"><span class="font-bold text-3xl">Website Dengan Pemilihan </span> <span
                        class="text-2xl">Lokasi/Tempat</span> <br> <span class="font-semibold text-2xl text-hover">Strategis
                        Untuk Bisnis Anda</span></p>
                <button class="btn btn-info wow fadeInLeft">Mulai Pencarian</button>
            </div>
        </div>
    </div>
    {{-- Card --}}

    <div class="bg-info w-full pt-10">
        <section class="container mx-auto box-border ">
            <div class="px-2 md:px-4 py-5">
                <div class="flex flex-wrap gap-2 hover:transform-gpu">
                    @for ($i = 0; $i < 5; $i++)
                        <div class="card card-compact w-96 bg-base-100 shadow-xl wow fadeInUp" data-wow-delay="33{{ $i }}" data-wow-duration="{{ $i }}s">
                            <figure><img src="{{ asset('img/1.jpg') }}" class="w-full bg-cover" alt="Shoes" /></figure>
                            <div class="card-body bg-neutral text-white hover:text-2xl transition-all">
                                <h2 class="card-title !group-hover:text-3xl ">Shoes!</h2>
                                <p>If a dog chews shoes whose shoes does he choose?</p>
                                <div class="card-actions justify-end">
                                    <button class="btn btn-primary"><svg class="w-6 h-6" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg></button>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </section>
    </div>
@endsection
