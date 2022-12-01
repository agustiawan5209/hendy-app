<x-app-layout>
    <x-slot name="page">Detail {{ $alternatif->kode }}</x-slot>
    <div class=" px-4 py-2 flex justify-center">
        <div
            class="w-full flex flex-col justify-center overflow-auto items-start shadow-lg shadow-gray-600 max-w-4xl rounded-lg bg-white">
            <div class="flex justify-start px-4 py-2 w-full">
                <a href="{{ route('Alternatif.index') }}" class="btn btn-error btn-lg">Tutup!</a>
            </div>
            <table class="table w-full table-bordered rounded-sm">
                <tr>
                    <td class="border border-black bg-info text-white">Kode</td>
                    <td class="border border-black ">{{ $alternatif->kode }}</td>
                </tr>
                <tr>
                    <td class="border border-black bg-info text-white">Nama Alternatif</td>
                    <td class="border border-black ">{{ $alternatif->nama }}</td>
                </tr>
                <tr>
                    <td class="border border-black bg-info text-white">Lokasi</td>
                    <td class="border border-black ">{{ $alternatif->lokasi->lokasi }}</td>
                </tr>
                <tr>
                    <td class="border border-black bg-info text-white">Pemilik</td>
                    <td class="border border-black ">{{ $alternatif->lokasi->pemilik }}</td>
                </tr>
                <tr>
                    <td class="border border-black bg-info text-white">Deskripsi</td>
                    <td class="border border-black ">{{ $alternatif->lokasi->deskripsi }}</td>
                </tr>
                <tr>
                    <td class="border border-black bg-info text-white">Gambar</td>
                    <td class="border border-black ">
                        <img src="{{ asset('storage/lokasi/' . $alternatif->lokasi->gambar) }}"
                            class=" w-1/2 bg-cover h-1/2" alt="" srcset="">
                    </td>
                </tr>
            </table>
            <div class="divider">Sub Alternatif</div>
            <table class="table w-full table-bordered rounded-sm">
                @foreach ($alternatif->subalternatif as $item)
                    <tr>
                        <td class="border border-black bg-info text-white w-1/2">{{ $item->kriteria != null ? $item->kriteria->name : '' }}</td>
                        <td class="border border-black ">{{ $item->sub_kriteria }}</td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>

</x-app-layout>
