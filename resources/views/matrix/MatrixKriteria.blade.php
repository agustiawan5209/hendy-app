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
                @php
                    $NB;
                    if ($i == $b) {
                        $NB = 1;
                    } else {
                        if ($i < $b) {
                            $NB = $kriteria[$i]['kode'] . $kriteria[$b]['kode'];
                            $NilaiBobot = \App\Models\NilaiBobotKriteria::where('kriteria1', $kriteria[$i]['kode'])
                                ->where('kriteria2', $kriteria[$b]['kode'])
                                ->first();
                                $NilaiBobot2 = \App\Models\NilaiBobotKriteria::where('kriteria2', $kriteria[$i]['kode'])
                                ->where('kriteria1', $kriteria[$b]['kode'])
                                ->first();
                                $NB = round($NilaiBobot->nilai_banding / $NilaiBobot2->nilai_banding, 2);

                        } else {
                            $NilaiBobot = \App\Models\NilaiBobotKriteria::where('kriteria1', $kriteria[$i]['kode'])
                                ->where('kriteria2', $kriteria[$b]['kode'])
                                ->first();
                            $NilaiBobot2 = \App\Models\NilaiBobotKriteria::where('kriteria2', $kriteria[$i]['kode'])
                                ->where('kriteria1', $kriteria[$b]['kode'])
                                ->first();
                            $NB = round($NilaiBobot->nilai_banding / $NilaiBobot2->nilai_banding, 2);
                            // $hasil_array[$b] = $NB;

                            // $NB = $kriteria[$i]['kode'] . ':'. $kriteria[$b]['kode'] . " (". $NilaiBobot->nilai_banding ." / ". $NilaiBobot2->nilai_banding .")";
                        }
                    }
                @endphp
                {{ $NB }}
                @php
                $hasil_array[$b][$i] = $NB;
            @endphp
            </x-td>
        @endfor
    </tr>

@endfor
<tr>
    <x-td class="bg-info text-info-content">Hasil</x-td>
    @for ($b = 0; $b < $batas; $b++)
        <x-td class="bg-info text-info-content">
            {{ array_sum($hasil_array[$b]) }}
            {{-- {{ $hasil_array[$b] }} --}}
        </x-td>
    @endfor
</tr>
