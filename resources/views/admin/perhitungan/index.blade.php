<x-app-layout>
    <x-slot name="page">Halaman Perhitungan</x-slot>
    <div class="flex flex-col w-full">
        <div class="grid text-white card bg-info rounded-box place-items-center">Matrix Kriteria</div>
        <table class="table table-compact w-full TableMatrixKriteria">

        </table>
        <div class="divider"></div>
    </div>
    <div class="flex flex-col w-full">
        <div class="grid text-white card bg-info rounded-box place-items-center">Matrix Nilai Kriteria</div>
        <table class="table table-compact w-full" id="MatrixNilaiKriteria">

        </table>
        <div class="divider"></div>
    </div>
    <div class="flex flex-col w-full">
        <div class="grid text-white card bg-info rounded-box place-items-center">Matrix CM Kriteria</div>
        <table class="table table-compact w-full" id="MatrixCMKriteria">

        </table>
        <div class="divider"></div>
    </div>

</x-app-layout>
