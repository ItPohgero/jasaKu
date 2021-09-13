<x-guest-layout>
    <main class="bg-gradient-to-t from-yellow-200 via-red-100 to-purple-100">
        <section class="py-3 px-4 w-full">
            <div class="flex justify-between items-center mb-2">
                <div>
                    <div class="text-xs text-gray-400">Hallo,</div>
                    @auth
                    <div class="text-xs font-bold capitalize">{{ Auth::user()->name }}</div>
                    @else
                    <div class="text-xs font-bold capitalize">Guys!</div>
                    @endauth
                </div>
                <div>
                    @auth
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <a href="{{ route('profile.show') }}"
                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />
                    </a>
                    @else
                    <span class="inline-flex rounded-md">
                        <a href="{{ route('profile.show') }}"
                            class="shadow uppercase inline-flex items-center ml-1 px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-gray-500 bg-gray-100 dark:bg-gray-700 hover:text-gray-700 focus:outline-none transition">
                            {{ Str::limit(Auth::user()->name, 1, '') }}
                        </a>
                    </span>
                    @endif
                    @else
                    <a href="{{ route('profile.show') }}"
                        class="shadow uppercase inline-flex items-center p-1 border border-transparent text-sm leading-4 font-medium rounded-full text-gray-500 bg-gray-100 dark:bg-gray-700 hover:text-gray-700 focus:outline-none transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a>
                    @endauth
                </div>
            </div>
            <hr class="border-dashed pb-3 border-gray-400">
            <div class="w-full">
                <div class="flex justify-center items-center bg-white rounded-xl p-1 gap-2 w-full">
                    <form action="{{ route('search') }}" method="get" class="w-full flex gap-2">
                        <select name="keyword" class="w-full dark:bg-gray-700 border-white text-xs
                    focus:border-yellow-300 focus:ring focus:ring-yellow-200 focus:ring-opacity-20 rounded-lg py-1">
                            @foreach (App\Models\Skill::get() as $item)
                            <option value="{{ $item->slug }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <button class="p-2 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </section>
        <section x-data="imageSlider" class="rounded-md  overflow-hidden px-5 z-10">

            <div
                class="rounded-full bg-gray-50 bg-opacity-40 text-gray-200 absolute mt-3 top-32 right-9 text-xs px-2 text-center z-10">
                <span x-text="currentIndex"></span>/<span x-text="images.length"></span>
            </div>

            <button @click="previous()"
                class="absolute left-8 top-60 translate-y-1/2 bg-gray-50 opacity-30 hover:opacity-100 rounded-full w-8 h-8 flex justify-center items-center shadow-md z-10">
                <svg class="w-4 h-4 font-bold text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7">
                    </path>
                </svg>
            </button>

            <button @click="forward()"
                class="absolute right-8 top-60 translate-y-1/2 bg-gray-50 opacity-30 hover:opacity-100 rounded-full w-8 h-8 flex justify-center items-center shadow-md z-10">
                <svg class="w-4 h-4 font-bold text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>

            <div class="relative h-60 w-auto">
                <template x-for="(image, index) in images">
                    <div x-show="currentIndex == index + 1" x-transition:enter="transition transform duration-300"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="transition transform duration-300" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" class="absolute top-0">
                        <img :src="image" alt="image" class="rounded-xl shadow-lg">
                    </div>
                </template>
            </div>
        </section>
        <section class="grid grid-cols-4 text-center gap-4 px-7">
            <div class="p-3 flex justify-center">
                <div class="bg-white p-3 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-700" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <div class="p-3 flex justify-center">
                <div class="bg-white p-3 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-700" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <div class="p-3 flex justify-center">
                <div class="bg-white p-3 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-700" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <div class="p-3 flex justify-center">
                <div class="bg-white p-3 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-700" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </section>
        <section class="grid grid-cols-4 text-center gap-4 px-7">
            <span class="text-xs">Semua Service</span>
            <span class="text-xs">lore</span>
            <span class="text-xs">lore</span>
            <span class="text-xs">lore</span>
        </section>
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
    <script>
        document.addEventListener('alpine:init', () => {
                Alpine.data('imageSlider', () => ({
                    currentIndex: 1,
                    images: [
                        'https://unsplash.it/640/425?image=30',
                        'https://unsplash.it/640/425?image=40',
                        'https://unsplash.it/640/425?image=50'
                    ],
                    previous() {
                        if (this.currentIndex > 1) {
                            this.currentIndex = this.currentIndex - 1;
                        }
                    },
                    forward() {
                        if (this.currentIndex < this.images.length) {
                            this.currentIndex = this.currentIndex + 1;
                        }
                    }
                }))
            })
    </script>
</x-guest-layout>