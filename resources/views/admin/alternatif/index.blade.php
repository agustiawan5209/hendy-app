<x-app-layout>

    <x-slot name="page">Alternatif</x-slot>
    {{-- Modal Tambah Alternatif --}}
    <!-- Put this part before </body> tag -->
    {{-- Table --}}
    <x-table>
        <x-slot name="input">
            <a href="{{ route('Alternatif.create') }}" class="btn">Tambah</a>
        </x-slot>
        <x-slot name="head">
            <x-th data-priority="1">No.</x-th>
            <x-th data-priority="1">Kode</x-th>
            <x-th data-priority="2">alternatif</x-th>
            <x-th data-priority="2">kecamatan</x-th>
            <x-th data-priority="2">Pemilik</x-th>
            <x-th data-priority="3">Aksi</x-th>
        </x-slot>
        <x-slot name="body">
            @foreach ($alternatif as $item)
                <x-tr>
                    <x-td>{{ $loop->iteration }}</x-td>
                    <x-td>{{ $item->kode }}</x-td>
                    <x-td>{{ $item->nama }}</x-td>
                    <x-td>{{ $item->kecamatan }}</x-td>
                    <x-td>{{ $item->lokasi->pemilik }}</x-td>
                    <x-td>
                        <x-tdaction :edit="true" :delete="true" :routeEdit="route('Alternatif.edit', ['id' => $item->id])"
                            routeDelete="deleteAlternatif " :idDelete="$item->id" :detail="true" :routeDetail="route('Alternatif.show', ['id' => $item->id])"  />
                    </x-td>
                </x-tr>
            @endforeach
        </x-slot>
    </x-table>
    <script>
        $(document).ready(function() {
            $(".deleteAlternatif").click(function(e) {
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
                        url: "/Alternatif/destroy/" + id,
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
