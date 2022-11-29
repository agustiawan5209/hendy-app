<x-app-layout>
    <x-slot name="page">Edit {{ $alternatif->name }}</x-slot>
    <div class=" px-4 py-2 flex justify-center">
        <div class="w-full flex justify-center items-start shadow-lg shadow-gray-600 max-w-md py-5 rounded-lg">

            <form action="{{ route('Alternatif.update', ['id' => $alternatif->id]) }}" method="POST"
                class="flex flex-col justify-start items-start" enctype="multipart/form-data">
                <div class="flex flex-col">
                    <x-validation-errors />
                </div>
                @csrf
                @method('PUT')
                <div class="form-control">
                    <label class="label">
                        <span class="label-kode">Kode Alternatif</span>
                    </label>
                    <label class="input-group input-group-lg">
                        <span>Kode</span>
                        <input type="text" placeholder="....." name="kode" class="input input-bordered" value="{{ $alternatif->kode }}"/>
                    </label>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-nama">Nama Alternatif</span>
                    </label>
                    <label class="input-group input-group-lg">
                        <span>Nama</span>
                        <input type="text" placeholder="....." name="nama" class="input input-bordered" value="{{ $alternatif->nama }}"/>
                    </label>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-nama">Gambar</span>
                    </label>
                    <label class="input-group input-group-lg">
                        <span>gambar</span>
                        <input type="file" placeholder="....." name="gambar" class="input input-bordered" value="{{ $alternatif->lokasi->gambar }}" />
                    </label>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-nama">Lokasi</span>
                    </label>
                    <label class="input-group input-group-lg">
                        <span>Lokasi</span>
                        <input type="text" placeholder="....." name="lokasi" class="input input-bordered" value="{{ $alternatif->lokasi->lokasi }}"/>
                    </label>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-nama">Pemilik</span>
                    </label>
                    <label class="input-group input-group-lg">
                        <span>Pemilik</span>
                        <input type="text" placeholder="....." name="pemilik" class="input input-bordered"value="{{ $alternatif->lokasi->pemilik }}" />
                    </label>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-nama">Deskripsi</span>
                    </label>
                    <label class="input-group input-group-lg">
                        <span>Deskripsi</span>
                        <textarea class="textarea textarea-bordered" name="deskripsi" placeholder="Deskripsi Area/Lokasi">{{ $alternatif->lokasi->deskripsi }}
                        </textarea>
                    </label>
                </div>
                <div class="modal-action flex justify-between">
                    <button type="submit" for="my-modal" class="btn btn-success">Simpan!</button>
                    <a href="{{ route('Alternatif.index') }}" for="my-modal" class="btn btn-error">Tutup!</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
