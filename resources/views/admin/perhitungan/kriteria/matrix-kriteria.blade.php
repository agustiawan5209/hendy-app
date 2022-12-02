@php

    $jumlah = $prioritas['jumlah'];
    $prioritas = $prioritas['prioritas'];
    $batas = count($kriteria);
@endphp
<tr>
    <x-th class="bg-info text-info-content">Kode</x-th>
    @for ($i = 0; $i < $batas; $i++)
        <x-th class="bg-info text-info-content">{{ $kriteria[$i]['kode'] }}</x-th>
    @endfor
</tr>
@php
    $hasil_array = [];
@endphp

@for ($i = 0; $i < $batas; $i++)
    <tr>
        <x-td class="bg-info text-info-content">{{ $kriteria[$i]['kode'] }}</x-td>
        @for ($b = 0; $b < $batas; $b++)
            <x-td class="bg-info text-info-content">
              {{ $matrix['kriteria'][$i][$b] }}
            </x-td>
        @endfor
    </tr>

@endfor
<tr>
    <x-td class="bg-info text-info-content">Hasil</x-td>
    @for ($b = 0; $b < count($matrix['bobot']); $b++)
        <x-td class="bg-info text-info-content">
            {{$matrix['bobot'][$b] }}
        </x-td>
    @endfor
</tr>
