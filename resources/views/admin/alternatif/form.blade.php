<x-app-layout>
    <x-slot name="page">{{ $edit ? 'Edit Alternatif ' . $alternatif->name : 'Tambah Alternatif' }}</x-slot>
    <div class=" px-4 py-2 flex justify-center">
        <div class="w-full flex justify-center items-start shadow-lg shadow-gray-600 max-w-4xl py-5 rounded-lg bg-white">

            <form
                action="{{ $edit ? route('Alternatif.update', ['id' => $alternatif->id]) : route('Alternatif.store') }}"
                method="POST" class="flex flex-col justify-start items-start" enctype="multipart/form-data">
                <div class="flex flex-col">
                    <x-validation-errors />
                </div>
                @csrf
                @if ($edit == true)
                    @method('PUT')
                @else
                    @method('POST')
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="col-span-1 box-border relative">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-kode">Kode Alternatif</span>
                            </label>
                            <label class="input-group input-group-lg">
                                <span>Kode</span>
                                <input type="text" placeholder="....." name="kode" readonly
                                    class="input input-bordered"
                                    value="{{ $edit == false ? $kode : $alternatif->kode }}" />
                            </label>
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-nama">Nama Alternatif</span>
                            </label>
                            <label class="input-group input-group-lg">
                                <span>Nama</span>
                                <input type="text" placeholder="....." name="nama" class="input input-bordered"
                                    value="{{ $edit == false ? '' : $alternatif->nama }}" />
                            </label>
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-nama">Gambar</span>
                            </label>
                            <label class="input-group input-group-lg ">
                                <input type="file" placeholder="....." name="gambar"
                                    class="file-input  file-input-bordered w-full"
                                    value="{{ $edit == false ? '' : $alternatif->lokasi->gambar }}" />
                            </label>
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-nama">Lokasi</span>
                            </label>
                            <label class="input-group input-group-lg">
                                <span>Lokasi</span>
                                <input type="text" placeholder="....." name="lokasi" class="input input-bordered"
                                    value="{{ $edit == false ? '' : $alternatif->lokasi->lokasi }}" />
                            </label>
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-nama">Pemilik</span>
                            </label>
                            <label class="input-group input-group-lg">
                                <span>Pemilik</span>
                                <input type="text" placeholder="....." name="pemilik"
                                    class="input input-bordered"value="{{ $edit == false ? '' : $alternatif->lokasi->pemilik }}" />
                            </label>
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-nama">Deskripsi</span>
                            </label>
                            <label class="input-group input-group-lg">
                                <span>Deskripsi</span>
                                <textarea class="textarea textarea-bordered" name="deskripsi" placeholder="Deskripsi Area/Lokasi">{{ $edit == false ? '' : $alternatif->lokasi->deskripsi }}
                                </textarea>
                            </label>
                        </div>
                        {{-- Detail Sub Alternatif --}}

                    </div>
                    <div class="col-span-1">
                        <div class="divider w-1/2">Detail Alternatif</div>
                        @foreach ($kriteria as $item)
                            <div class="form-control">
                                <label class="input-group input-group-sm input-group-vertical">
                                    <span>{{ $item->name }}</span>
                                    <select name="kodeSub[]" id="" class="select select-bordered">
                                        @if ($edit)
                                            @foreach ($subalternatif as $suba)
                                                @if ($item->kode == $suba->kriteria_kode)
                                                    <option value="{{ $suba->nama }}" selected>{{ $suba->sub_kriteria }}</option>

                                                @endif
                                            @endforeach
                                        @endif
                                        <option value="">-----</option>
                                        @foreach ($item->subkriteria as $sub)
                                            <option value="{{ $item->kode }},{{ $sub->nama }}">
                                                {{ $sub->nama }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-action flex justify-between">
                    <button type="submit" for="my-modal" class="btn btn-success">Simpan!</button>
                    <a href="{{ route('Alternatif.index') }}" for="my-modal" class="btn btn-error">Tutup!</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
