<x-guest-layout>
    <main class="bg-gradient-to-t from-yellow-200 via-red-100 to-purple-100">
        @include('welcome._header')
        @include('welcome._slider_image')
        @include('welcome._menu_box')
        <section class="mt-5 flex justify-center bg-gray-100 m-auto p-auto py-3">
            <div class="flex overflow-x-scroll hide-scroll-bar">
                <div class="flex flex-nowrap">
                    <div class="inline-block px-3">
                        <div
                            class="w-64 h-full text-xs max-w-xs overflow-hidden rounded-xl bg-white flex justify-center p-5 items-center">
                            Jadilah seperti pohon kayu yang lebat buahnya, tumbuh ditepi jalan. Dilempar buahnya
                            dengan
                            batu,
                            tetapi tetap membalas dengan buah
                        </div>
                    </div>
                    <div class="inline-block px-3">
                        <div
                            class="w-64 h-full text-xs max-w-xs overflow-hidden rounded-xl bg-white flex justify-center p-5 items-center">
                            Mahkota seseorang adalah akalnya. Derajat seseorang adalah agamanya. Sedangkan
                            kehormatan
                            seseorangan adalah budi pekertinya.
                        </div>
                    </div>
                    <div class="inline-block px-3">
                        <div
                            class="w-64 h-full text-xs max-w-xs overflow-hidden rounded-xl bg-white flex justify-center p-5 items-center">
                            Aku tidak pernah menyesali diamku. Tetapi aku berkali-kali menyesali bicaraku.
                        </div>
                    </div>
                    <div class="inline-block px-3">
                        <div
                            class="w-64 h-full text-xs max-w-xs overflow-hidden rounded-xl bg-white flex justify-center p-5 items-center">
                            Terkadang, orang dengan masa lalu yang paling kelam akan menciptakan masa depan yang
                            paling
                            cerah.
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .hide-scroll-bar {
                    -ms-overflow-style: none;
                    scrollbar-width: none;
                }

                .hide-scroll-bar::-webkit-scrollbar {
                    display: none;
                }
            </style>
        </section>
    </main>
    <main class="text-center mt-5 mb-40">
        <p class="text-gray-800 font-bold">Application Version 1.1</p>
        <p class="text-xs">&copy; {{ date('Y') }} ITP Developer</p>
    </main>
</x-guest-layout>