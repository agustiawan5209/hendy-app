<ul class="menu bg-info text-white w-full p-2 rounded-box block ">
    <li class="border-b border-white">
        <x-nav-link href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Dashboard
        </x-nav-link>
    </li>
    <li class="border-b border-white">
        <x-nav-link class="{{ request()->routeIs('nilaiPrefensi.index') ? 'active' : '' }}"
            href="{{ route('nilaiPrefensi.index') }}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                </path>
            </svg>
            Data Nilai
        </x-nav-link>
    </li>
    <li class="border-b border-white">
        <x-nav-link class="{{ request()->routeIs('Alternatif.index') ? 'active' : '' }}"
            href="{{ route('Alternatif.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Alternatif
        </x-nav-link>
    </li>
    <li class="border-b border-white">
        <x-nav-link class="{{ request()->routeIs('Kriteria.index') ? 'active' : '' }}"
            href="{{ route('Kriteria.index') }}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                </path>
            </svg>
            Kriteria
        </x-nav-link>
    </li>
    <li tabindex="0"
        class="relative border-b border-white transition-all ease-in ">
        <span class="{{ request()->routeIs('NilaiBobotKriteria.index') || request()->routeIs('NilaiBobotAlternatif.index') ? 'active text-white' : '' }}"> <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                </path>
            </svg>
            Nilai Bobot
            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg></span>
        <ul class=" absolute left-[80%] shadow-lg text-black transition-all bg-info ">
            <li class="border-b border-white">
                <x-nav-link class="{{ request()->routeIs('NilaiBobotKriteria.index') ? 'active' : '' }}"
                    href="{{ route('NilaiBobotKriteria.index') }}">Nilai Bobot Kriteria</x-nav-link>
            </li>
            <li class="border-b border-white">
                <x-nav-link class="{{ request()->routeIs('NilaiBobotAlternatif.index') ? 'active' : '' }}"
                    href="{{ route('NilaiBobotAlternatif.index') }}">Nilai Bobot Alternatif</x-nav-link>
            </li>
        </ul>
    </li>
    <li class="border-b border-white">
        <x-nav-link class="{{ request()->routeIs('Perhitungan.Index') ? 'active' : '' }}"
            href="{{ route('Perhitungan.Index') }}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                </path>
            </svg>
            Perhitungan
        </x-nav-link>
    </li>
</ul>
