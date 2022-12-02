@php
    $matrix = $CM['Jumlah_CM'];
    $CM = $CM['Hasil_CM'];
    $batas = count($kriteria);
@endphp

<table class="table table-compact">
    <tr>
        <x-th>Kode</x-th>
        @for ($i = 0; $i < $batas; $i++)
            <x-th>{{ $kriteria[$i]['kode'] }}</x-th>
        @endfor
        <x-th>CM</x-th>
    </tr>
    @php
        // dd($matrix);
    @endphp
    @for ($baris = 0; $baris < $batas; $baris++)
        <tr>
            <td>{{ $kriteria[$baris]['kode'] }}</td>
            @for ($kolom = 0; $kolom < $batas; $kolom++)
                <td>{{ $matrix[$baris][$kolom] }}</td>
            @endfor
            <td>{{ $CM[$baris] }}</td>
        </tr>
    @endfor
</table>
