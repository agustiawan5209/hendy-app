<!-- component -->
<div
    class="bg-info absolute top-0 left-0 bg-gradient-to-b from-gray-900 via-gray-900 to-info bottom-0 leading-5 h-full w-full overflow-hidden">

</div>
<div class="relative   min-h-screen  sm:flex sm:flex-row  justify-center bg-transparent rounded-3xl shadow-xl">
    <div class="flex-col flex  self-center lg:px-14 sm:max-w-4xl xl:max-w-md  z-10">
        <div class="self-start hidden lg:flex flex-col  text-gray-300">

            <h1 class="my-3 font-semibold text-4xl wow fadeInLeftBig">Selamat Datang!</h1>
            <p class="pr-3 text-sm opacity-75 wow fadeInUp">Sistem Pendukung Keputusan Pemilihan Lahan Usaha Strategis Minuman Boba
            </p>
        </div>
    </div>
    <div class="flex justify-center self-center  z-10">
        <div class="p-12 bg-white mx-auto rounded-3xl w-96 shadow-lg wow fadeInRightBig" data-wow-delay="500ms">
            {{ $slot }}
        </div>
    </div>
</div>

<svg class="absolute bottom-0 left-0 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#fff" fill-opacity="1"
        d="M0,0L40,42.7C80,85,160,171,240,197.3C320,224,400,192,480,154.7C560,117,640,75,720,74.7C800,75,880,117,960,154.7C1040,192,1120,224,1200,213.3C1280,203,1360,149,1400,122.7L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
    </path>
</svg>
