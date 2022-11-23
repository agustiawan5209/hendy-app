<x-app-layout>
    <x-slot name="page">Edit {{ $nilaiPrefensi->name }}</x-slot>
    <div class=" px-4 py-2 flex justify-center">
        <div class="w-full flex justify-center items-start shadow-lg shadow-gray-600 max-w-md py-5 rounded-lg">

            <form action="{{ route('nilaiPrefensi.update', ['id' => $nilaiPrefensi->id]) }}" method="POST"
                class="flex flex-col justify-center items-center">
                <div class="flex flex-col">
                    <x-validation-errors />
                </div>
                @csrf
                @method('PUT')
                <div class="form-control">
                    <label class="label">
                        <span class="label-kode">NilaiPrefensi</span>
                    </label>
                    <label class="input-group">
                        <span>Kode</span>
                        <input type="text" placeholder="....." name="kode" value="{{ $nilaiPrefensi->kode }}"
                            class="input input-bordered" />
                    </label>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-nama">Keterangan</span>
                    </label>
                    <label class="input-group">
                        <span>Nama</span>
                        <input type="text" placeholder="....." name="nama" value="{{ $nilaiPrefensi->nama }}"
                            class="input input-bordered" />
                    </label>
                </div>
                <div class="modal-action flex justify-between">
                    <button type="submit" for="my-modal" class="btn btn-success">Simpan!</button>
                    <a href="{{ route('nilaiPrefensi.index') }}" for="my-modal" class="btn btn-error">Tutup!</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
