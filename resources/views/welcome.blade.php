<x-guest-layout>
    <section class="bg-transparent">
        <div class="hero h-[90vh] bg-cover relative bg-white border-b-2">
            <div class="hero-overlay bg-opacity-60 bg-info"
                style="background-image: url({{ asset('svg/Wave-100s-1376px.svg') }})"></div>
            <div
                class="hero-content  z-10 w-full !justify-around lg:flex-row-reverse text-left text-neutral-content relative box-border">
                <img src="{{ asset('img/1.jpg') }}" class="max-w-sm rounded-lg shadow-2xl wow slideInRight"
                    data-wow-delay="300ms" data-wow-duration="1s" />
                <div class="max-w-full ">
                    <h1 class="mb-5 text-6xl font-bold element text-white wow fadeInLeftBig" data-wow-duration="1s">
                        Selamat Datang!!
                    </h1>
                    <p class="mb-5 wow fadeInUp text-info" data-wow-duration="1s"><span
                            class="font-bold text-3xl">Website Dengan
                            Pemilihan </span> <span class="text-2xl">Lokasi/Tempat</span> <br> <span
                            class="font-semibold text-2xl text-hover">Strategis
                            Untuk Bisnis Anda</span></p>
                    <button class="btn btn-info wow fadeInLeft text-white">Mulai Pencarian</button>
                </div>
            </div>
            {{-- <div class="shapedividers_com-4523 w-full h-32 absolute bottom-0"></div> --}}

            <div class="custom-shape-divider-top-1670015920">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                    preserveAspectRatio="none">
                    <path
                        d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                        class="shape-fill"></path>
                </svg>
            </div>
            <div class="border-svg-2"></div>
        </div>

        {{-- 5 Lokasi Terbaik Menurut Kriteria --}}
        <div class="w-full relative">
            <div class="border-svg-1"></div>
            <div class="title text-center py-3 ">
                <div class="text-base md:text-2xl text-gray-700 font-semibold flex w-full justify-center"> <span
                        class="text-info text-3xl wow slideInDown">4</span> <span
                        class="titlestrategis wow slideInRight">Lokasi Strategis</span>
                </div>
            </div>
            <div class="container mx-auto flex justify-center items-center z-10">
                <div class="py-4 md:py-10 px-3 gap-10 grid overflow-hidden grid-cols-3 grid-rows-2 ">
                    <div class="card card-compact  bg-base-100 shadow-sm shadow-gray-500 row-span-3"
                    data-aos="fade-right">
                    {{-- <figure><img src="https://placeimg.com/400/225/arch" alt="Shoes" /></figure> --}}
                    <div class="card-body">
                        <h2 class="card-title">Keuntungan Lokasi Strategis!</h2>
                        <p>Lokasi merupakan tempat terjadinya kegiatan operasi pada suatu
                            perusahaan. Lokasi memiliki fungsi yang strategis karena dapat
                            mencapai tujuan perusahaan dan dengan letak lokasi yang strategis
                            akan memaksimumkan laba. Lokasi yang strategis yaitu tempat yang
                            mudah dijangkau oleh para konsumen dan konsumen melakukan
                            keputusan pembelian terhadap suatu produk.
                            Lokasi yang strategis merupakan bagian yang sangat penting,
                            dengan adanya lokasi strategis maka usaha dan bisnis akan
                            mengalami kemajuan karena mudah dijangkau dan tempat tersebut
                            sangat cocok untuk jenis usaha yang didirikan.
                            Memilih lokasi merupakan salah satu kegiatan awal dalam
                            melakukan usaha. Pemilihan lokasi bisnis biasanya berlandaskan
                            pada segmen pasar atau target pembeli. Yang menjadi patokan
                            dalam bisnis yaitu segmen pasar atau target pembeli, seperti usia,
                            jenis kelamin, pendapatan, dan lain-lain. Segmen ini yang akan
                            menjadikan konsep perencanaan usaha agar mudah mencapai tujuan.
                            Terdapat beberapa tempat yang dapat dijadikan tempat usaha
                            yaitu mal, pusat keramaian, pasar, toko, pinggir sekolahan, dan lain
                            sebagainya. Lokasi yang dicari biasanya di kanan kirinya menjual</p>
                    </div>
                </div>
                    @foreach ($kecamatan as $key => $item)
                            <a href="{{ route('getKecamatan', $item->nama) }}">
                                <div class="card w-full bg-info px-4 py-5 text-xl text-white transition-all ease-linear shadow-xl image-full"
                                    data-aos="fade-left">
                                    {{ $item->nama }}
                                </div>
                            </a>
                    @endforeach
                </div>
            </div>

        </div>
        {{-- Card --}}
        <div class="grid h-20 card bg-accent rounded-none place-items-center "></div>
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
        <div class="container mx-auto py-3 md:py-8 md:px-10 relative z-10">
            <div class="border-svg-3 bottom-40 left-20 wow fadeInDown " data-wow-delay="2s"></div>
            <div class="border-svg-4 bottom-40"></div>
            <div class="flex flex-1 flex-wrap gap-4 box-border z-20">
                <div class="card border-b-2 w-96 " data-aos-delay="1000" data-aos-duration="1000" data-aos="fade-left">
                    <div class="card-body">
                        <h5 class="prose px-3 py-1 text-lg font-semibold border-b-4 border-gray-600 ">1. Bahan</h5>
                        <article class="prose text-justify text-sm">Salah satu modal yang harus dipersiapkan dalam usaha
                            minuman
                            boba adalah barang habis jadi. Termasuk di dalam barang habis jadi ini adalah bahan pembuat
                            boba dan
                            minumannya. Bahan-bahan yang dibutuhkan untuk membuat boba sendiri antara lain tepung
                            tapioka, air,
                            serta teh hitam untuk pewarnanya dan juga penambah cita rasa boba yang kuat. Agar bisa
                            memperoleh
                            harga
                            yang terjangkau, calon penjual bisa membeli bahan-bahan tersebut di online shop.
                            Menurut salah satu situs e-commerce, tepung tapioka dapat dibeli dengan harga sekitar 140
                            ribu
                            rupiah
                            tiap 10 kg sedangkan teh hitamnya sekitar 115 ribu rupiah. Ada pula bahan tambahan seperti
                            gula aren
                            dan
                            susu kental manis yang dapat dibeli dengan harga sekitar 200 ribu rupiah. Artinya uang yang
                            dibutuhkan
                            untuk membeli bahan pembuatan minuman boba sekitar 445 ribu rupiah.
                        </article>
                    </div>
                </div>
                <div class="card border-b-2 w-96 " data-aos-delay="500" data-aos-duration="1000" data-aos="fade-up">
                    <div class="card-body">
                        <h5 class="prose px-3 py-1 text-lg font-semibold border-b-4 border-gray-600 mt-5">2. Peralatan
                        </h5>
                        <article class="prose text-justify text-sm">Barang habis jadi yang juga perlu dipersiapkan
                            adalah
                            alat-alat.
                            Peralatan yang dibutuhkan untuk membuka usaha minuman boba antara lain adalah coolbox, gelas
                            plastik, sedotan
                            boba, dan cup sealer. Berdasarkan salah satu e-commerce, 100 pcs gelas plastik dapat dibeli
                            dengan
                            harga
                            Rp34.000 dan 100 sedotan boba seharga Rp11.000.
                            Untuk cool box sebenarnya adalah peralatan yang opsional. Jika sudah memiliki kulkas,
                            penjual tidak
                            perlu
                            membeli coolbox. Namun jika ingin, coolbox dapat dibeli dengan harga sekitar Rp 120 ribu.
                            Sedangkan
                            harga cup
                            sealer berkisar antara Rp 600 ribuan. Jadi, modal usaha minuman boba yang digunakan dalam
                            membeli
                            peralatan
                            penjualannya adalah sekitar Rp765.000.
                            Selain itu, sebenarnya juga dibutuhkan beberapa alat-alat dasar untuk pembuatan boba.
                            Alat-alat
                            tersebut antara
                            lain saringan, ketel atau teko kecil, panci dan lain sebagainya. Namun alat-alat itu bisa
                            didapatkan
                            di dapur
                            rumah tanpa perlu membelinya lagi.</article>
                    </div>
                </div>
                <div class="card border-b-2 w-96" data-aos-delay="700" data-aos-duration="1000" data-aos="fade-right">
                    <div class="card-body">
                        <h5 class="prose px-3 py-1 text-lg font-semibold border-b-4 border-gray-600 mt-10 font-inter">3.
                            Gerobak Atau Booth</h5>
                        <article class="prose text-justify text-sm">Jika usaha penjualan minuman boba akan dibuka di
                            pinggir
                            jalan, maka
                            dibutuhkan gerobak atau booth sebagai tempat jualannya. Booth minuman boba dapat dibeli
                            dengan harga
                            yang murah
                            melalui online shop, yaitu sekitar 590 ribu rupiah.</article>
                        <h5 class="prose px-3 py-1 text-lg font-semibold border-b-4 border-gray-600 ">4. Sewa Tempat
                        </h5>
                        <article class="prose text-justify text-sm">Jika berencana membuka usaha minuman boba di tempat
                            yang
                            tetap, maka
                            disarankan untuk menyewa tempat jualan. Harga sewa tempat sendiri bervariasi, tergantung
                            lokasi yang
                            dipilih.
                            Namun pada umumnya, penyewaan tempat jualan minuman boba berkisar Rp 1 jutaan per bulan.
                        </article>
                    </div>
                </div>
                <div class="card card-side border-b-2 w-full " data-aos-delay="500" data-aos-duration="1000"
                    data-aos="fade-up">
                    {{-- <figure class=" w-96"><img src="https://placeimg.com/200/280/arch" class="w-full"  alt="Movie"/></figure> --}}
                    <div class="card-body max-w-full">
                        <h5 class="prose px-3 py-1 text-lg font-semibold border-b-4 border-gray-600 ">5. Gaji Karyawan
                        </h5>
                        <article class="prose text-justify text-sm">Beberapa pendiri bisnis mungkin tidak bisa
                            menjalankan
                            bisnisnya
                            sendiri karena alasan tertentu. Oleh karena itu, ada kalanya diperlukan seorang karyawan
                            untuk
                            menjaga booth
                            atau tempat penjualan minuman boba. Biaya yang perlu disiapkan untuk menggaji seorang
                            pegawai
                            sebenarnya bisa
                            bervariasi sesuai dengan kebijakan yang berlaku. Namun pada umumnya, karyawan untuk
                            penjualan
                            minuman boba per
                            bulannya digaji sekitar Rp.1.200.000.
                            Itulah tadi paparan mengenai modal usaha minuman boba. Menurut paparan tersebut, dapat
                            disimpulkan
                            bahwa total
                            modal yang dibutuhkan untuk membuka usaha minuman boba adalah sekitar Rp4.000.000.
                            Sebenarnya ada
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
