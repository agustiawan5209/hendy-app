<x-app-layout>
    <x-slot name="page">Dashboard</x-slot>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        @for ($i = 0; $i < 4; $i++)
            <div class="card bg-success text-success-content">
                <div class="card-body items-center text-center">
                    <h2 class="card-title">Cookies!</h2>
                    <p>We are using cookies for no reason.</p>

                </div>
            </div>
        @endfor
    </div>
</x-app-layout>
