<x-app-layout>
    <x-slot name="page">Halaman Perhitungan</x-slot>
 <div class="w-full mx-auto overflow-hidden bg-white">
    <div class="flex flex-col w-full">
        <div class="grid h-10 font-bold text-white card bg-info rounded-box place-items-center">Matrix Kriteria</div>
        <table class="table table-auto w-full">
            @include('admin.perhitungan.kriteria.matrix-kriteria')
        </table>
        <div class="divider"></div>
    </div>
    <div class="flex flex-col w-full">
        <div class="grid h-10 font-bold text-white card bg-info rounded-box place-items-center">Matriks Bobot Prioritas
            Kriteria</div>
        @include('admin.perhitungan.kriteria.table-prioritas')
        <div class="divider"></div>
    </div>
    <div class="flex flex-col w-full">
        <div class="grid h-10 font-bold text-white card bg-info rounded-box place-items-center">Matriks Konsistensi
            Kriteria</div>
        @include('admin.perhitungan.kriteria.CM')
        <div class="divider"></div>
    </div>
    <div class="flex flex-col w-full overflow-x-auto">
        <div class="grid h-10 font-bold text-white card bg-info rounded-box place-items-center">tabel ratio index
            berdasarkan ordo
            matriks.</div>
        <table class="table table-compact w-full" id="OrdoMatrix">
            <tr>
                <td>Ordo matriks</td>
            </tr>
        </table>
        <table class="table table-compact">
            <tr>
                <td>Consistency Index:</td>
                <td id="Consistency_Index"></td>
            </tr>
            <tr>
                <td>Ratio Index: </td>
                <td id="Ratio_Index"></td>
            </tr>
            <tr>
                <td>Consistency Ratio:</td>
                <td id="Consistency_Ratio"></td>
            </tr>
        </table>
        <div class="divider"></div>
    </div>
    <div class="w-full flex flex-col px-3">
        <div class="overflow-x-auto w-full">
            <div class="grid h-20 text-white card bg-info rounded-box place-items-center">Tabel Perbandingan Alternatif
            </div>
        </div>
        <div class="table-alternatif w-full">
            @include('admin.perhitungan.alternatif.table')
        </div>
    </div>
    <div class="hero min-h-max bg-white">
        <div class="w-full">
            <h1 class="text-2xl font-bold text-center bg-info text-info-content">Hasil Akhir </h1>
            <p class="py-2 px-4 text-justify">Setelah menemukan bobot dari masing-masing kriteria terhadap lokasi yang
                sudah
                ditentukan oleh pihak perusahaan, langkah selanjutnya adalah mengalikan bobot dari masing,masing
                kriteria dengan bobot dari masing-masing lokasi, kemudian hasil perkalian tersebut dijumlahkan
                perbaris. Sehingga didapatkan total prioritas global seperti pada tabel berikut.</p>

          @include('admin.perhitungan.alternatif.nilaiAkhir')
        </div>
    </div>
    {{-- <div class="hero min-h-max bg-base-200 border border-black">
        <div class="hero-content !w-full text-center">
            <div class="w-full border border-black bg-white">
                <h1 class="text-2xl font-bold">Grafik Hasil Perankingan</h1>
                <div style="width: 600px; margin: auto;">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div> --}}

 </div>
</x-app-layout>
