<x-app-layout>

    <x-slot name="page">Table Perbandingan Kriteria</x-slot>
    <div class="card w-full bg-info text-gray-800">
        <div class="card-body">
            <div class="flex justify-around">
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text text-white text-2xl">Kriteria 1</span>
                    </label>
                    <select class="select select-bordered">
                        @foreach ($bobot as $item)
                            <option class="text-gray-800" value="{{ $item->datakriteria1->id }}">{{ $item->datakriteria1->kode }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text text-white text-2xl">Nilai Perbandingan</span>
                    </label>
                    <select class="select select-bordered">
                        @foreach ($prefensi as $item)
                            <option class="text-gray-800" value="{{ $item->id }}">{{ $item->kode }} - {{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text text-white text-2xl">Kriteria 2</span>
                    </label>
                    <select class="select select-bordered">
                        @foreach ($bobot as $item)
                            <option class="text-gray-800" value="{{ $item->datakriteria1->id }}">{{ $item->datakriteria1->kode }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text text-white text-2xl">-</span>
                    </label>
                    <button type="submit" class="btn btn-accent">Ganti</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Table --}}
    <div class="px-4 py-5">
        <div class="overflow-auto box-border">
            @php
                $batas = count($kriteria);
            @endphp
            <table class="table w-full">
                <tr>
                    <x-th class="bg-info text-info-content">Kode</x-th>
                    @for ($i = 0; $i < $batas; $i++)
                        <x-th class="bg-info text-info-content">{{ $kriteria[$i]['kode'] }}</x-th>
                    @endfor
                </tr>

                @for ($i = 0; $i < $batas; $i++)
                    <tr>
                        <x-td class="bg-info text-info-content">{{ $kriteria[$i]['kode'] }}</x-td>

                        @for ($b = 0; $b < $batas; $b++)
                            @if ($kriteria[$i]['kriteria1']['nilai_banding'] != null || $kriteria[$i]['kriteria2']['nilai_banding'] != null)
                                <x-td class="bg-info text-info-content">
                                    {{ $kriteria[$i]['kriteria1']['nilai_banding'] }}</x-td>
                            @else
                                <x-td class="bg-info text-info-content">Nilai Banding</x-td>
                            @endif
                        @endfor
                    </tr>
                @endfor
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
