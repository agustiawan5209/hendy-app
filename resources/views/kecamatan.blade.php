<x-guest-layout>
    <section class="bg-transparent">

        {{-- 5 Lokasi Terbaik Menurut Kriteria --}}
        <div class="w-full relative">
            <div class="border-svg-1"></div>
            <div class="title text-center py-3 ">
                <div class="text-base md:text-2xl text-gray-700 font-semibold flex w-full justify-center">
                    <span
                        class="titlestrategis wow slideInRight">Lokasi Strategis</span>
                        &nbsp;
                    <span
                        class="text-info text-3xl wow slideInDown">{{ $kecamatan }}</span>
                </div>
            </div>
            <div class="container mx-auto flex justify-center items-center z-10">
                <div class="py-4 md:py-10 px-3 gap-10 grid overflow-hidden grid-cols-3 grid-rows-2 ">
                    @foreach ($nilaiMatrix as $key => $item)
                    <a href="{{ route('Usaha.show', $item->id) }}">
                        <div class="card w-96 h-52  transition-all ease-linear bg-base-100 shadow-xl image-full"
                            data-aos="fade-left">
                            <figure><img src="{{ asset('storage/lokasi/' . $item->alternatif->lokasi->gambar) }}"
                                    class="w-full bg-cover bg-fixed transition-all ease-linear"
                                    alt="Shoes" /></figure>
                            <div class="card-body">
                                <h2 class="card-title">{{ $item->alternatif->nama }}</h2>
                                <p>{{ $item->alternatif->lokasi->deskripsi }}</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
</x-guest-layout>
