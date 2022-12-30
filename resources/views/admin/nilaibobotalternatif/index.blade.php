<x-app-layout>

    <x-slot name="page">Table Perbandingan alternatif</x-slot>
    <div class="card w-full bg-info text-gray-800">
        <div class="card-body">
            <x-validation-errors />
            <form action="{{ route('NilaiBobotAlternatif.edit') }}" method="POST" class="grid grid-cols-1 grid-rows-2">
                @csrf
                @method('PUT')
                <div class="col-span-1 flex flex-1 items-center">
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text text-white text-sm md:text-xl">Pilih Kriteria</span>
                        </label>
                        <select class="select select-bordered kriteria_id" name="kriteria_id" id="kriteria_id">
                            <option value="">---</option>
                            @for ($z = 0; $z < count($kriteria); $z++)
                                <option class="text-gray-800" value="{{ $kriteria[$z]['kode'] }}"
                                    {{ $kode_kriteria == $kriteria[$z]['kode'] ? 'selected' : '' }}>
                                    {{ $kriteria[$z]['kode'] }} - {{ $kriteria[$z]['name'] }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text text-white text-sm md:text-xl">Pilih Kecamatan</span>
                        </label>
                        <select class="select select-bordered kecamatan" name="kecamatan" id="kecamatan">
                            <option value="">---</option>
                            @for ($z = 0; $z < count($kecamatan); $z++)
                                <option class="text-gray-800" value="{{ $kecamatan[$z]['nama'] }}">{{ $kecamatan[$z]['nama'] }}</option>
                            @endfor
                        </select>

                    </div>
                    <div class="form-control">
                        <label for="" class="label">A</label>
                        <button type="button" class="btn btn-accent" id="cari_alternatif">cari</button>
                    </div>
                </div>
                <div class=" col-span-1 flex  justify-around">
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text text-white text-sm md:text-xl">alternatif 1</span>
                        </label>
                        <select class="select select-bordered" name="alternatif1">
                            @for ($z = 0; $z < count($alternatif); $z++)
                                <option class="text-gray-800" value="{{ $alternatif[$z]['kode'] }}">
                                    {{ $alternatif[$z]['kode'] }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text text-white text-sm md:text-xl">Nilai Perbandingan</span>
                        </label>
                        <select class="select select-bordered" name="nilai_banding">
                            @foreach ($prefensi as $item)
                                <option class="text-gray-800" value="{{ $item->id }}">{{ $item->kode }} -
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text text-white text-sm md:text-xl">alternatif 2</span>
                        </label>
                        <select class="select select-bordered" name="alternatif2">
                            @for ($l = 0; $l < count($alternatif); $l++)
                                <option class="text-gray-800" value="{{ $alternatif[$l]['kode'] }}">
                                    {{ $alternatif[$l]['kode'] }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text text-white text-sm md:text-xl">-</span>
                        </label>
                        <button type="submit" class="btn btn-accent">Ganti</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Table --}}
    <div class="px-4 py-5">
        <div class="overflow-auto box-border">
            @php
                $batas = count($alternatif);
                $hasil = [];
                $var = 0;
                $alternatif_arr = [];
            @endphp
            <table class="table w-full">
                <tr>
                    <x-th class="bg-info text-info-content">Kode</x-th>
                    @for ($i = 0; $i < $batas; $i++)
                        <x-th class="bg-info text-info-content">{{ $alternatif[$i]['kode'] }}</x-th>
                    @endfor
                </tr>

                <tbody id="table_banding_alternatif">

                </tbody>
            </table>
        </div>
    </div>
    <script>

    </script>
</x-app-layout>
