<x-guest-layout>
    <div class="flex flex-col justify-center items-center px-5 py-3 relative">
        <div class="grid grid-cols-3 md:grid-cols-7">
            @foreach ($kriteria as $item)
                <div class="form-control">
                    <select class="select text-white bg-info shadow-sm shadow-white" name="kode">
                        <option selected>{{ $item->name }}</option>
                        @foreach ($item->subkriteria as $item)
                            <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
            @endforeach
        </div>
        <div class="border-svg-1"></div>
        <div class="border-svg-2"></div>
        <br>
        <div class="flex justify-center items-center">
            <div class="w-96">
                <button class="btn btn-primary text-white hover:text-gray-100 w-full" type="button">CARI</button>
            </div>
        </div>
    </div>
</x-guest-layout>
