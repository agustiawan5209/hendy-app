<x-guest-layout>
    <form action="{{ route('Usaha.GetAlternatif') }}" method="POST"
        class="flex flex-col justify-center items-center px-5 py-3 relative">
        @csrf
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-7">
            @foreach ($kriteria as $item)
                <div class="form-control">
                    <label class="input-group input-group-vertical">
                        <span
                            class="label text-nowrap whitespace-nowrap bg-info text-white text-sm border">{{ $item->name }}</span>
                        <select class="select text-black bg-white shadow-sm shadow-white select-bordered" name="kode[]">
                            <option selected value="">---</option>
                            @foreach ($item->subkriteria as $subitem)
                                <option value="{{ $item->kode }},{{ $subitem->nama }}">{{ $subitem->nama }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
            @endforeach
        </div>
        <div class="border-svg-1"></div>
        <br>
        <div class="flex justify-center items-center">
            <div class="w-96">
                <button class="btn btn-primary text-white hover:text-gray-100 w-full" type="submit">Cari</button>
            </div>
        </div>
    </form>
    <div class="md:container md:px-4 overflow-x-auto mx-auto py-4 border-none bg-transparent">
        @if (isset($NilaiM))
            <table class=" table table-compact   table-zebra w-full">
                <thead>
                    <tr>
                        <th class="bg-info text-white text-base capitalize">gambar</th>
                        {{-- <th class="bg-info text-white text-base capitalize">kode</th> --}}
                        <th class="bg-info text-white text-base capitalize">lokasi</th>
                        <th class="bg-info text-white text-base capitalize">pemilik</th>
                        <th class="bg-info text-white text-base capitalize">deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($NilaiM->count() > 0)
                        @foreach ($NilaiM as $item)
                            <tr>
                                <td class="border-spacing-1 text-gray-800 w-20">
                                    <div class="avatar">
                                        <div class="w-24 rounded">
                                            <img src="{{ asset('storage/lokasi/' . $item->alternatif->lokasi->gambar) }}"
                                                class=" image-full" alt="">
                                        </div>
                                    </div>
                                </td>
                                {{-- <td class="border-spacing-1 max-w-max text-gray-800">{{ $item->alternatif->kode }}</td> --}}
                                <td class="border-spacing-1 max-w-max text-gray-800">
                                    {{ $item->alternatif->lokasi->lokasi }}</td>
                                <td class="border-spacing-1 max-w-max text-gray-800">
                                    {{ $item->alternatif->lokasi->pemilik }}</td>
                                <td class="border-spacing-1 max-w-max text-gray-800">
                                    {{ $item->alternatif->lokasi->deskripsi }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">Maaf Data Kosong</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        @endif
    </div>
</x-guest-layout>
