<table class="table table-compact w-full table-zebra">
    @php
        $keygen = $prioritas['prioritas'];
    @endphp
    <tr>
        <x-th>Kecamatan</x-th>
        <x-th>Alternatif</x-th>
        @for ($i = 0; $i < count($kriteria); $i++)
            <x-th>{{ $kriteria[$i]['kode'] }}</x-th>
        @endfor
        <x-th>Nilai</x-th>
        <x-th>Ranking</x-th>
        <x-th>Detail</x-th>
    </tr>
    <tr>
        <td></td>
        <td class="border border-gray-800">Vektor Eigen</td>
        @for ($i = 0; $i < count($kriteria); $i++)
            <td class="border border-gray-800">{{ $keygen[$i] }}</td>
        @endfor
    </tr>
    @foreach ($NilaiMatrix as $item => $val)
        <tr>
            <x-td>{{ $val->kecamatan }}</x-td>
            <x-td>{{ $val->kode }}</x-td>
            @php
                $im = explode('/', $val->data);
            @endphp
            @for ($kolom = 0; $kolom < count($im); $kolom++)
                <x-td>{{ $im[$kolom] }}</x-td>
            @endfor
            <x-td>{{ $val->ranking }}</x-td>
            <x-td>{{ $item + 1 }}</x-td>
            <x-td>
                <a href="{{ route('Alternatif.show', ['id'=> $val->id]) }}" class=" p-1 rounded bg-blue-500 text-white">
                   detail
                </a>
            </x-td>
        </tr>
    @endforeach
</table>
