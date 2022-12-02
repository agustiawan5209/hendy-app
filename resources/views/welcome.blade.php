<x-guest-layout>
    <section>
        <div class="hero h-screen bg-cover relative" style="background-image: url('img/3.png');">
            <div class="hero-overlay bg-opacity-60"></div>
            <div
                class="hero-content  z-10 w-full !justify-around lg:flex-row-reverse text-left text-neutral-content relative box-border">
                <img src="{{ asset('img/1.jpg') }}" class="max-w-sm rounded-lg shadow-2xl wow slideInRight"
                    data-wow-delay="300ms" data-wow-duration="1s" />
                <div class="max-w-full ">
                    <h1 class="mb-5 text-6xl font-bold element wow fadeInLeftBig" data-wow-duration="1s">Selamat Datang!!
                    </h1>
                    <p class="mb-5 wow fadeInUp" data-wow-duration="1s"><span class="font-bold text-3xl">Website Dengan
                            Pemilihan </span> <span class="text-2xl">Lokasi/Tempat</span> <br> <span
                            class="font-semibold text-2xl text-hover">Strategis
                            Untuk Bisnis Anda</span></p>
                    <button class="btn btn-info wow fadeInLeft">Mulai Pencarian</button>
                </div>
            </div>
            {{-- <div class="shapedividers_com-4523 w-full h-32 absolute bottom-0"></div> --}}

            <div class="absolute bottom-0 w-full bg-fixed">
                <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 600"
                    xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150">
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
                        class="text-info text-3xl wow slideInDown">4</span> <span
                        class="titlestrategis wow slideInRight">Lokasi Strategis</span></div>
            </div>
            <div class="m-0 p-0 grid grid-cols-4 gap-0 ">
                @foreach ($nilaiMatrix as $item)
                    <div
                        class=" bg-base-100 border-2 border-gray-800 shadow-sm image-full rounded-none hover:bg-blue-600 hover:text-white transition-all ease-in-out ">
                        <figure><img src="{{ asset('storage/lokasi/' . $item->alternatif->lokasi->gambar) }}"
                                alt="Shoes" class="w-full" /></figure>
                        <div class="card-body rounded-none">
                            <h2 class="card-title">{{ $item->nama }}</h2>
                            <p>{{ $item->alternatif->lokasi->deskripsi }}</p>
                            <div class="card-actions justify-end">
                                <button class="btn btn-info text-white">Detail</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- Card --}}
        <div class="grid h-20 card bg-accent rounded-none place-items-center"></div>
        {{-- <div class="w-full  py-3 md:pb-10 relative box-border">

            <div class="grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-4 z-20 px-3 md:px-11">
                @foreach ($alternatif as $item)
                    <div class="card bg-white shadow-lg border border-gray-700">
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
        </div> --}}
        <div class="container mx-auto py-3 md:py-8 md:px-10 relative">
            <div class="border-svg-3 bottom-40 left-20 wow fadeInDown " data-wow-delay="2s"></div>
            <div class="border-svg-4 bottom-40"></div>
            <div class="flex flex-1 flex-wrap gap-4 box-border wow fadeInLeft" >
                <div class="card border-b-2 w-96 wow fadeInUp" data-wow-delay="0.7s" data-wow-duration="1s">
                    <div class="card-body">
                        <h5 class="prose px-3 py-1 text-lg font-semibold border-b-4 border-gray-600 ">1. Bahan</h5>
                        <article class="prose text-justify text-sm">Salah satu modal yang harus dipersiapkan dalam usaha
                            minuman
                            boba adalah barang habis jadi. Termasuk di dalam barang habis jadi ini adalah bahan pembuat boba dan
                            minumannya. Bahan-bahan yang dibutuhkan untuk membuat boba sendiri antara lain tepung tapioka, air,
                            serta teh hitam untuk pewarnanya dan juga penambah cita rasa boba yang kuat. Agar bisa memperoleh
                            harga
                            yang terjangkau, calon penjual bisa membeli bahan-bahan tersebut di online shop.
                            Menurut salah satu situs e-commerce, tepung tapioka dapat dibeli dengan harga sekitar 140 ribu
                            rupiah
                            tiap 10 kg sedangkan teh hitamnya sekitar 115 ribu rupiah. Ada pula bahan tambahan seperti gula aren
                            dan
                            susu kental manis yang dapat dibeli dengan harga sekitar 200 ribu rupiah. Artinya uang yang
                            dibutuhkan
                            untuk membeli bahan pembuatan minuman boba sekitar 445 ribu rupiah.
                        </article>
                    </div>
                </div>
                <div class="card border-b-2 w-96 wow fadeInUp" data-wow-delay="0.7s"
                    data-wow-duration="1s">
                    <div class="card-body">
                        <h5 class="prose px-3 py-1 text-lg font-semibold border-b-4 border-gray-600 mt-5">2. Peralatan</h5>
                        <article class="prose text-justify text-sm">Barang habis jadi yang juga perlu dipersiapkan adalah
                            alat-alat.
                            Peralatan yang dibutuhkan untuk membuka usaha minuman boba antara lain adalah coolbox, gelas
                            plastik, sedotan
                            boba, dan cup sealer. Berdasarkan salah satu e-commerce, 100 pcs gelas plastik dapat dibeli dengan
                            harga
                            Rp34.000 dan 100 sedotan boba seharga Rp11.000.
                            Untuk cool box sebenarnya adalah peralatan yang opsional. Jika sudah memiliki kulkas, penjual tidak
                            perlu
                            membeli coolbox. Namun jika ingin, coolbox dapat dibeli dengan harga sekitar Rp 120 ribu. Sedangkan
                            harga cup
                            sealer berkisar antara Rp 600 ribuan. Jadi, modal usaha minuman boba yang digunakan dalam membeli
                            peralatan
                            penjualannya adalah sekitar Rp765.000.
                            Selain itu, sebenarnya juga dibutuhkan beberapa alat-alat dasar untuk pembuatan boba. Alat-alat
                            tersebut antara
                            lain saringan, ketel atau teko kecil, panci dan lain sebagainya. Namun alat-alat itu bisa didapatkan
                            di dapur
                            rumah tanpa perlu membelinya lagi.</article>
                    </div>
                </div>
                <div class="card border-b-2 w-96 wow fadeInUp" data-wow-delay="1s"
                    data-wow-duration="1s">
                    <div class="card-body">
                        <h5 class="prose px-3 py-1 text-lg font-semibold border-b-4 border-gray-600 mt-10 font-inter">3. Gerobak Atau Booth</h5>
                        <article class="prose text-justify text-sm">Jika usaha penjualan minuman boba akan dibuka di pinggir
                            jalan, maka
                            dibutuhkan gerobak atau booth sebagai tempat jualannya. Booth minuman boba dapat dibeli dengan harga
                            yang murah
                            melalui online shop, yaitu sekitar 590 ribu rupiah.</article>
                            <h5 class="prose px-3 py-1 text-lg font-semibold border-b-4 border-gray-600 ">4. Sewa Tempat</h5>
                        <article class="prose text-justify text-sm">Jika berencana membuka usaha minuman boba di tempat yang
                            tetap, maka
                            disarankan untuk menyewa tempat jualan. Harga sewa tempat sendiri bervariasi, tergantung lokasi yang
                            dipilih.
                            Namun pada umumnya, penyewaan tempat jualan minuman boba berkisar Rp 1 jutaan per bulan.</article>
                    </div>
                </div>
                <div class="card card-side border-b-2 w-full wow fadeInUp" data-wow-delay="2s"
                    data-wow-duration="1s">
                    {{-- <figure class=" w-96"><img src="https://placeimg.com/200/280/arch" class="w-full"  alt="Movie"/></figure> --}}
                    <div class="card-body max-w-full">
                        <h5 class="prose px-3 py-1 text-lg font-semibold border-b-4 border-gray-600 ">5. Gaji Karyawan</h5>
                        <article class="prose text-justify text-sm">Beberapa pendiri bisnis mungkin tidak bisa menjalankan
                            bisnisnya
                            sendiri karena alasan tertentu. Oleh karena itu, ada kalanya diperlukan seorang karyawan untuk
                            menjaga booth
                            atau tempat penjualan minuman boba. Biaya yang perlu disiapkan untuk menggaji seorang pegawai
                            sebenarnya bisa
                            bervariasi sesuai dengan kebijakan yang berlaku. Namun pada umumnya, karyawan untuk penjualan
                            minuman boba per
                            bulannya digaji sekitar Rp.1.200.000.
                            Itulah tadi paparan mengenai modal usaha minuman boba. Menurut paparan tersebut, dapat disimpulkan
                            bahwa total
                            modal yang dibutuhkan untuk membuka usaha minuman boba adalah sekitar Rp4.000.000. Sebenarnya ada
                            banyak sekali
                            pilihan dalam membuka suatu usaha bisnis. Namun, lagi-lagi setiap usaha memiliki
                            tantangan-tantangannya sendiri
                            yang tentunya tidak mudah. Jadi, tetap semangat dan jangan menyerah.</article>
                    </div>
                </div>
            </div>

        </div>
    </section>
</x-guest-layout>
