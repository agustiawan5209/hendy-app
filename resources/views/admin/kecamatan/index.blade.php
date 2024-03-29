<x-app-layout>

    <x-slot name="page">Kriteria</x-slot>
    {{-- Modal Tambah Kriteria --}}
    <!-- Put this part before </body> tag -->
    <input type="checkbox" id="my-modal" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box max-w-md">
            <form action="{{ route('Kecamatan.store') }}" method="POST" class="flex flex-col justify-center items-center">
                @csrf
                @method('POST')
                <div class="form-control">
                    <label class="label">
                        <span class="label-kode">Nama Kecamatan</span>
                    </label>
                    <label class="input-group">
                        <span>Kecamatan</span>
                        <input type="text" placeholder="....." name="nama" class="input input-bordered" value="{{ old('kecamatan') }}" />
                    </label>
                </div>
                <div class="modal-action flex justify-between">
                    <button type="submit" for="my-modal" class="btn btn-success">Simpan!</button>
                    <label for="my-modal" class="btn btn-error">Tutup!</label>
                </div>
            </form>
        </div>
    </div>
    {{-- Table --}}
    <x-table>
        <x-slot name="input">
            <label for="my-modal" class="btn">Tambah</label>


        </x-slot>
        <x-slot name="head">
            <x-th data-priority="1">No.</x-th>
            <x-th data-priority="1">Name</x-th>
            <x-th data-priority="3">Aksi</x-th>
        </x-slot>
        <x-slot name="body">
            @foreach ($kecamatan as $item)
                <x-tr>
                    <x-td>{{ $loop->iteration }}</x-td>
                    <x-td>{{ $item->nama }}</x-td>
                    <x-td>
                        <x-tdaction :edit="true" :delete="true" :routeEdit="route('Kecamatan.edit', ['id' => $item->id])" routeDelete="deleteKecamatan "
                            :idDelete="$item->id" :detail="false"  />
                    </x-td>
                </x-tr>
            @endforeach
        </x-slot>
    </x-table>
    <script>
        $(document).ready(function() {
            $(".deleteKecamatan").click(function(e) {
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
                        url: "/Kecamatan/destroy/" + id,
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
