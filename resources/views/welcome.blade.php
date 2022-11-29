@extends('page.layout')
@section('content')
    <div class="hero h-screen bg-cover relative" style="background-image: url('img/3.png'); background-attachment:fixed">
        <div class="hero-overlay bg-opacity-60"></div>
        <div
            class="hero-content  z-10 w-full !justify-around lg:flex-row-reverse text-left text-neutral-content relative box-border">
            <img src="{{ asset('img/1.jpg') }}" class="max-w-sm rounded-lg shadow-2xl wow slideInRight" data-wow-delay="300ms"
                data-wow-duration="1s" />
            <div class="max-w-full ">
                <h1 class="mb-5 text-6xl font-bold element wow fadeInLeftBig" data-wow-duration="1s">Selamat Datang!!</h1>
                <p class="mb-5 wow fadeInUp" data-wow-duration="1s"><span class="font-bold text-3xl">Website Dengan
                        Pemilihan </span> <span class="text-2xl">Lokasi/Tempat</span> <br> <span
                        class="font-semibold text-2xl text-hover">Strategis
                        Untuk Bisnis Anda</span></p>
                <button class="btn btn-info wow fadeInLeft">Mulai Pencarian</button>
            </div>
        </div>
        {{-- <div class="shapedividers_com-4523 w-full h-32 absolute bottom-0"></div> --}}

        <div class="absolute bottom-0 w-full bg-fixed">
            <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 600" xmlns="http://www.w3.org/2000/svg"
                class="transition duration-300 ease-in-out delay-150">
                <path
                    d="M 0,600 C 0,600 0,200 0,200 C 70.46375815870832,170.1374098248025 140.92751631741663,140.27481964960495 219,133 C 297.07248368258337,125.72518035039505 382.75369288904164,141.0381312263827 442,143 C 501.24630711095836,144.9618687736173 534.057712126417,133.57265544486432 593,156 C 651.942287873583,178.42734455513568 737.0154586052903,234.67124699416004 807,237 C 876.9845413947097,239.32875300583996 931.8804534524218,187.7423565784954 993,186 C 1054.1195465475782,184.2576434215046 1121.4627275850225,232.35932669185846 1197,243 C 1272.5372724149775,253.64067330814154 1356.2686362074887,226.8203366540708 1440,200 C 1440,200 1440,600 1440,600 Z"
                    stroke="none" stroke-width="0" fill="#0c4a6e" fill-opacity="0.53"
                    class="transition-all duration-300 ease-in-out delay-150 path-0"></path>
                <path
                    d="M 0,600 C 0,600 0,400 0,400 C 74.57574716592237,419.2456200618344 149.15149433184473,438.49124012366883 222,449 C 294.84850566815527,459.50875987633117 365.96976983854347,461.28065956715903 427,460 C 488.03023016145653,458.71934043284097 538.9694263139814,454.386121607695 613,431 C 687.0305736860186,407.613878392305 784.1525249055308,365.1748540020612 852,375 C 919.8474750944692,384.8251459979388 958.4204740638957,446.91446238406047 1009,460 C 1059.5795259361043,473.08553761593953 1122.165578838887,437.167296461697 1196,419 C 1269.834421161113,400.832703538303 1354.9172105805565,400.4163517691515 1440,400 C 1440,400 1440,600 1440,600 Z"
                    stroke="none" stroke-width="0" fill="#0c4a6e" fill-opacity="1"
                    class="transition-all duration-300 ease-in-out delay-150 path-1"></path>
            </svg>
        </div>
    </div>

    {{-- 5 Lokasi Terbaik Menurut Kriteria --}}
    <div class="w-full">
        <div class="title text-center py-3 ">
            <div class="text-base md:text-2xl text-gray-700 font-semibold flex w-full justify-center"> <span
                    class="text-info text-3xl wow slideInDown">4</span> <span class="titlestrategis wow slideInRight">Lokasi Strategis</span></div>
        </div>
        <div class="m-0 p-0 grid grid-cols-4 gap-0 ">
            @for ($i = 0; $i < 4; $i++)
                <div class=" bg-base-100 border-2 border-gray-800 shadow-sm image-full rounded-none hover:bg-blue-600 hover:text-white transition-all ease-in-out ">
                    <figure><img src="https://placeimg.com/400/225/arch" alt="Shoes" /></figure>
                    <div class="card-body rounded-none">
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
    {{-- Card --}}
    <div class="w-full  py-3 md:py-10 relative box-border">

        <div class="flex flex-col md:flex-row flex-1 md:gap-8 z-20 px-3 md:px-11">
            @foreach ($alternatif as $item)
                <div class="card w-96 bg-white shadow-lg border border-gray-700">
                    <figure class="h-64"><img src="{{ asset('storage/lokasi/' . $item->lokasi->gambar) }}"
                            class="w-full bg-cover" alt="car!" /></figure>
                    <div class="card-body py-2">
                        <h2 class="card-title">{{ $item->nama }}</h2>
                        <p>Lokasi Maps: {{ $item->lokasi->lokasi }}</p>
                        <p>Info Pemilik: {{ $item->lokasi->pemilik }}</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-primary">Detail</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="border-svg-1"></div>
        <div class="border-svg-2"></div>
    </div>
@endsection
