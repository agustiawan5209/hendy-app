<x-app-layout>
    <x-slot name="page">Dashboard</x-slot>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        @for ($i = 0; $i < 4; $i++)
        <div class="card card-side bg-base-100 shadow-xl">
            <figure><svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path></svg></figure>
            <div class="card-body">
              <div class="card-actions justify-end">
                <button class="btn btn-primary">Watch</button>
              </div>
            </div>
          </div>
        @endfor
    </div>
</x-app-layout>
