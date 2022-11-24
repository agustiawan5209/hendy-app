<x-app-layout>

    <x-slot name="page">Table Perbandingan alternatif</x-slot>
    <div class="card w-full bg-info text-gray-800">
        <div class="card-body">
            <x-validation-errors />
            <form action="#" method="POST" class="flex flex-col">
                @csrf
                @method('PUT')
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text text-white text-2xl">Pilih Kriteria</span>
                    </label>
                    <select class="select select-bordered kriteria_id" name="kriteria_id" id="kriteria_id">
                        <option value="">---</option>
                        @for ($z = 0; $z < count($kriteria); $z++)
                            <option class="text-gray-800" value="{{ $kriteria[$z]['kode'] }}">
                                {{ $kriteria[$z]['kode'] }} - {{ $kriteria[$z]['name'] }}</option>
                        @endfor
                    </select>
                </div>
                @csrf
                @method('PUT')
                <div class="flex justify-around">
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text text-white text-2xl">alternatif 1</span>
                        </label>
                        <select class="select select-bordered" name="alternatif1">
                            @for ($z = 0; $z < count($alternatif); $z++)
                                <option class="text-gray-800" value="{{ $alternatif[$z]['kode'] }}">
                                    {{ $alternatif[$z]['kode'] }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text text-white text-2xl">Nilai Perbandingan</span>
                        </label>
                        <select class="select select-bordered" name="nilai_banding">
                            @foreach ($prefensi as $item)
                                <option class="text-gray-800" value="{{ $item->id }}">{{ $item->kode }} -
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text text-white text-2xl">alternatif 2</span>
                        </label>
                        <select class="select select-bordered" name="alternatif2">
                            @for ($l = 0; $l < count($alternatif); $l++)
                                <option class="text-gray-800" value="{{ $alternatif[$l]['kode'] }}">
                                    {{ $alternatif[$l]['kode'] }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text text-white text-2xl">-</span>
                        </label>
                        <button type="submit" class="btn btn-accent">Ganti</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Table --}}
    <div class="px-4 py-5">
        <div class="overflow-auto box-border">
            @php
                $batas = count($alternatif);
                $hasil = [];
                $var = 0;
                $alternatif_arr = [];
            @endphp
            <table class="table w-full">
                <tr>
                    <x-th class="bg-info text-info-content">Kode</x-th>
                    @for ($i = 0; $i < $batas; $i++)
                        <x-th class="bg-info text-info-content">{{ $alternatif[$i]['kode'] }}</x-th>
                    @endfor
                </tr>

                @for ($i = 0; $i < $batas; $i++)
                    <tr>
                        <x-td class="bg-info text-info-content">{{ $alternatif[$i]['kode'] }}</x-td>
                        @for ($b = 0; $b < $batas; $b++)
                            <x-td class="bg-info text-info-content">
                                @php
                                    $NB;
                                    if ($i == $b) {
                                        $NB = 1;
                                    } else {
                                        if ($i < $b) {
                                            $NB = '0';
                                        } else {
                                            $NB = '2';
                                        }
                                    }
                                @endphp
                                {{ $NB }}
                            </x-td>
                        @endfor
                    </tr>
                @endfor
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".deletealternatif").click(function(e) {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Tidal, Batal!',
                    reverseButtons: true
                }).then((result) => {
                    e.preventDefault();
                    var id = $(this).attr('aria-id')
                    console.log(id)
                    $.ajax({
                        type: "GET",
                        url: "/alternatif/destroy/" + id,
                        success: function(response, status, data) {
                            if (status == "success") {
                                if (result.isConfirmed) {
                                    swalWithBootstrapButtons.fire(
                                        'Berhasi;!',
                                        'Berhasil Di Hapus'
                                    )
                                    setTimeout(function() {
                                        window.location.reload();
                                    }, 1000);
                                }
                            } else if (
                                /* Read more about handling dismissals below */
                                result.dismiss === Swal.DismissReason.cancel
                            ) {
                                swalWithBootstrapButtons.fire(
                                    'Cancelled',
                                    'Your imaginary file is safe :)',
                                    'error'
                                )
                            }
                        }
                    });

                })
            });
        });
    </script>
</x-app-layout>
