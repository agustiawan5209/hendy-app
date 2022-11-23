<x-app-layout>

    <x-slot name="page">Table Perbandingan Kriteria</x-slot>

    {{-- Table --}}
    <table class="table w-full">

        <thead >
            <x-th data-priority="1">kode</x-th>
            <x-th data-priority="2">Prefensi</x-th>
            <x-th data-priority="3">Kriteria1</x-th>
            <x-th data-priority="3">Kriteria2</x-th>
        </thead>
        <tbody>
            @foreach ($bobot as $item)
                <x-tr>
                    <x-td>{{ $item->kode }}</x-td>
                    <x-td>{{ $item->nilai_banding }}</x-td>
                    <x-td>{{ $item->kriteria1 }}</x-td>
                    <x-td>{{ $item->kriteria2 }}</x-td>
                </x-tr>
            @endforeach
        </tbody>
    </table>
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
