<table class="table table-compact w-full table-zebra">
    @php
        $keygen = $prioritas['prioritas'];
    @endphp
    <tr>
        <x-th>Alternatif</x-th>
        @for ($i = 0; $i < count($kriteria); $i++)
            <x-th>{{ $kriteria[$i]['kode'] }}</x-th>
        @endfor
        <x-th>Nilai</x-th>
        <x-th>Ranking</x-th>
    </tr>
    <tr>
        <td class="border border-gray-800">Vektor Eigen</td>
        @for ($i = 0; $i < count($kriteria); $i++)
            <td class="border border-gray-800">{{ $keygen[$i] }}</td>
        @endfor
    </tr>
    @foreach ($NilaiMatrix as $item => $val)
        <tr>
            <x-td>{{ $val->kode }}</x-td>
            @php
                $im = explode('/', $val->data);
            @endphp
            @for ($kolom = 0; $kolom < count($im); $kolom++)
                <x-td>{{ $im[$kolom] }}</x-td>
            @endfor
            <x-td>{{ $val->ranking }}</x-td>
            <x-td>{{ $item + 1 }}</x-td>
        </tr>
    @endforeach
</table>
