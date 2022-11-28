<x-app-layout>
    <x-slot name="page">Halaman Perhitungan</x-slot>
    <div class="flex flex-col w-full">
        <div class="grid h-10 font-bold text-white card bg-info rounded-box place-items-center">Matrix Kriteria</div>
        <table class="table table-compact w-full TableMatrixKriteria">

        </table>
        <div class="divider"></div>
    </div>
    <div class="flex flex-col w-full">
        <div class="grid h-10 font-bold text-white card bg-info rounded-box place-items-center">Matrix Nilai Kriteria</div>
        <table class="table table-compact w-full" id="MatrixNilaiKriteria">

        </table>
        <div class="divider"></div>
    </div>
    <div class="flex flex-col w-full">
        <div class="grid h-10 font-bold text-white card bg-info rounded-box place-items-center">Matrix CM Kriteria</div>
        <table class="table table-compact w-full" id="MatrixCMKriteria">

        </table>
        <div class="divider"></div>
    </div>
    <div class="flex flex-col w-full">
        <div class="grid h-10 font-bold text-white card bg-info rounded-box place-items-center">tabel ratio index berdasarkan ordo
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
        <div class="table-alternatif">
            <div class="flex flex-col justify-center" id="TemplateTable">

            </div>
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

            <table id="HasilAlternatif" class="table table-compact w-full">
                <tr>
                    <td>Hai</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="hero min-h-max bg-base-200 border border-black">
        <div class="hero-content !w-full text-center">
            <div class="w-full border border-black bg-white">
                <h1 class="text-2xl font-bold">Grafik Hasil Perankingan</h1>
                <div style="width: 600px; margin: auto;">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
