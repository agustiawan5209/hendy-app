<x-app-layout>

    <x-slot name="page">Table Perbandingan Kriteria</x-slot>
    <div class="card w-full bg-info text-gray-800">
        <div class="card-body">
            <x-validation-errors />
            <form action="{{ route('NilaiBobotKriteria.update') }}" method="POST"
                class="flex flex-col md:flex-row justify-around">
                @csrf
                @method('PUT')
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text text-white text-base md:text-xl">Kriteria 1</span>
                    </label>
                    <select class="select select-bordered" name="kriteria1">
                        @for ($z = 0; $z < count($kriteria); $z++)
                            <option class="text-gray-800" value="{{ $kriteria[$z]['kode'] }}">
                                {{ $kriteria[$z]['kode'] }}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text text-white text-base md:text-xl">Nilai Perbandingan</span>
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
                        <span class="label-text text-white text-base md:text-xl">Kriteria 2</span>
                    </label>
                    <select class="select select-bordered" name="kriteria2">
                        @for ($l = 0; $l < count($kriteria); $l++)
                            <option class="text-gray-800" value="{{ $kriteria[$l]['kode'] }}">
                                {{ $kriteria[$l]['kode'] }}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text text-white text-base md:text-xl">-</span>
                    </label>
                    <button type="submit" class="btn btn-accent">Ganti</button>
                </div>
            </form>
        </div>
    </div>
    {{-- Table --}}
    <div class="px-4 py-5">
        <div class="overflow-auto box-border">
            @php
                $batas = count($kriteria);
                $hasil = [];
                $var = 0;
                $kriteria_arr = [];
            @endphp
            <table class="table table-auto w-full">
                @include('matrix.MatrixKriteria', ['batas' => $batas, 'kriteria' => $kriteria])

            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".deleteKriteria").click(function(e) {
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
                        url: "/Kriteria/destroy/" + id,
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
