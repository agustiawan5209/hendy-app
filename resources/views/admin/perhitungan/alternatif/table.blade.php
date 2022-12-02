@php
    $batas = count($alternatif);
@endphp
@for ($i = 0; $i < count($matrixalternatif); $i++)
    @php
        $matrix = $matrixalternatif[$kriteria[$i]['kode']]['alternatif'];
        $matrix_bobot = $matrixalternatif[$kriteria[$i]['kode']]['Matrix_alternatif'];
        $table = $matrixalternatif[$kriteria[$i]['kode']]['nama_table'];
        $prioritas = $matrixalternatif[$kriteria[$i]['kode']]['prioritas'];
        $hasil_matrix = $matrixalternatif[$kriteria[$i]['kode']]['bobot'];
        $bobot_prioritas = $matrixalternatif[$kriteria[$i]['kode']]['bobot_prioritas'];
    @endphp

    <table class="table table-compact w-full table-zebra">
        <tr>
            <x-th colspan='{{ $batas + 1 }}' class="text-left py-3 text-lg">Matriks Perbandingan Alternatif Berdasarkan {{ $kriteria[$i]['name'] }}
            </x-th>
        </tr>
        <tr>

            <x-th>Kode</x-th>
            @for ($head = 0; $head < $batas; $head++)
                <x-th>{{ $table[$head]['kode'] }}</x-th>
            @endfor
        </tr>
        @for ($baris = 0; $baris < $batas; $baris++)
            <tr>
                <x-td>{{ $table[$baris]['kode'] }}</x-td>
                @for ($kolom = 0; $kolom < $batas; $kolom++)
                    <x-td>{{ $matrix[$baris][$kolom] }}</x-td>
                @endfor
            </tr>
        @endfor
        <tr>
            <x-td>Total Kolom</x-td>
            @for ($hasil = 0; $hasil < $batas; $hasil++)
                <x-td>{{ $hasil_matrix[$hasil] }}</x-td>
            @endfor
        </tr>
    </table>
    <br>
    <table class="table table-compact w-full table-zebra">
        <tr>
            <x-th colspan='{{ $batas + 2 }}' class="text-left py-3 text-lg">Matrik bobot prioritas alternatif berdasarkan:
                {{ $kriteria[$i]['kode'] }}
            </x-th>
        </tr>
        <tr>
            <x-th>Kode</x-th>
            @for ($head = 0; $head < $batas; $head++)
                <x-th>{{ $table[$head]['kode'] }}</x-th>
            @endfor
            <x-th>Bobot</x-th>
        </tr>
        @for ($baris = 0; $baris < $batas; $baris++)
            <tr>
                <x-td>{{ $table[$baris]['kode'] }}</x-td>
                @for ($kolom = 0; $kolom < $batas; $kolom++)
                    <x-td>{{ $matrix_bobot[$baris][$kolom] }}</x-td>
                @endfor
                <x-td>{{ $bobot_prioritas[$baris] }}</x-td>
            </tr>
        @endfor
    </table>
    <div class="divider"></div>
@endfor
