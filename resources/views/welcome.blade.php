<x-guest-layout>
    <main class="bg-gradient-to-t from-gray-700 via-red-200 to-gray-200">
        <x-alert></x-alert>
        @include('welcome._header')
        @include('welcome._slider_image')
        @include('welcome._menu_box')
        <section class="mt-3">
            <hr class="border-dashed mx-6 border-purple-200">
            <p class="animate-pulse text-center py-1 text-yellow-200 text-xs">Jangan khawatir, vendor kami telah
                terverifikasi
                standar
                kerja
            </p>
        </section>
        @include('welcome._scroll')
    </main>
    @include('welcome._data_worker')
    <main class="text-center mt-5 mb-40">
        <p class="text-gray-800 font-bold text-sm">Application Version 1.1</p>
        <p class="text-xs">&copy; {{ date('Y') }} Dignitas Academy</p>
    </main>
</x-guest-layout>