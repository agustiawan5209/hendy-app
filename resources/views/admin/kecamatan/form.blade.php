<x-app-layout>
    <x-slot name="page">Edit {{ $edit == false? '' : $Kecamatan->name }}</x-slot>
    <div class=" sm:px-4 py-2 flex justify-center">
        <div class="w-full flex justify-center items-end shadow-lg shadow-gray-600 max-w-md py-5 rounded-lg">

            <form action="{{ route('Kecamatan.update', ['id' => $edit == false ? '' : $Kecamatan->id]) }}" method="POST"
                class="flex flex-col justify-center items-center">
                <div class="flex flex-col">
                    <x-validation-errors />
                </div>
                @csrf
                @method('PUT')
                <div class="form-control">
                    <label class="label">
                        <span class="label-nama">Nama Kecamatan</span>
                    </label>
                    <label class="input-group">
                        <span>Nama</span>
                        <input type="text" placeholder="....." name="nama" value="{{ $edit == false? '' : $Kecamatan->nama }}"
                            class="input input-bordered" />
                    </label>
                </div>
                <div class="modal-action flex justify-between">
                    <button type="submit" for="my-modal" class="btn btn-success">Simpan!</button>
                    <a href="{{ route('Kecamatan.index') }}" for="my-modal" class="btn btn-error">Tutup!</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
