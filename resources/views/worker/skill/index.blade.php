<x-worker-layout>
    <div class="container py-2 grid mx-auto">
        <!-- CTA -->
        <span
            class="flex items-center justify-between px-4 py-2 mb-4 text-sm font-semibold text-yellow-100 bg-gradient-to-r from-yellow-600 to-yellow-400 rounded-lg shadow-md focus:outline-none focus:shadow-outline-yellow">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                    </path>
                </svg>
                <span class="uppercase text-xs">{{ $worker->skills->count() }} Skill yang anda miliki</span>
            </div>
            <button @click="openModal" class="bg-yellow-600 text-white py-1 px-4 rounded-full shadow-sm">Add
                Skill</button>
        </span>
        <div class='md:flex shadow-lg'>
            <div
                class="md:w-1/2 text-gray-800 dark:text-gray-300 bg-gray-100 dark:bg-gray-800 p-8 sm:rounded-tr-lg md:rounded-tr-none md:rounded-bl-lg rounded-tl-lg">
                <div class="w-full">
                    <h1 class="text-xl mb-5 font-bold capitalize text-center text-gray-600">Skill anda</h1>
                    @foreach ($worker->skills as $item)
                    <div class="flex justify-between text-xs capitalize my-1 border-b border-dashed pb-2">
                        <span>* {{ $item->name }} |
                            Rp. {{ number_format($item->price) }}{{ $item->an }}</span>
                        <a href="{{ route('worker.skill.remove', $item->id) }}"
                            onclick="return confirm('apakah anda yakin?')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M6.707 4.879A3 3 0 018.828 4H15a3 3 0 013 3v6a3 3 0 01-3 3H8.828a3 3 0 01-2.12-.879l-4.415-4.414a1 1 0 010-1.414l4.414-4.414zm4 2.414a1 1 0 00-1.414 1.414L10.586 10l-1.293 1.293a1 1 0 101.414 1.414L12 11.414l1.293 1.293a1 1 0 001.414-1.414L13.414 10l1.293-1.293a1 1 0 00-1.414-1.414L12 8.586l-1.293-1.293z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="md:w-1/2 relative">
                <div
                    class="bg-white-500 w-full h-full absolute sm:rounded-bl-lg md:rounded-bl-none md:rounded-tr-lg rounded-br-lg">
                </div>
                <img class="h-full w-full object-cover sm:rounded-bl-lg md:rounded-bl-none md:rounded-tr-lg rounded-br-lg opacity-10"
                    src="{{ asset('img/skills.jpg') }}" alt="Banner" />
                <div class="absolute top-10 w-full items-center">
                    <div class="flex justify-center font-bold uppercase">Informasi</div>
                    <p class="py-3 px-6 text-xs text-justify">
                        Orang akan menemukan anda berdasarkan kategori keterampilan
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal backdrop. This what you want to place close to the closing body tag -->
    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal"
            @keydown.escape="closeModal"
            class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="modal">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <header class="flex justify-between">
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300 capitalize">
                    Add Skills
                </p>
                <button
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close" @click="closeModal">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>
            <!-- Modal body -->
            <form action="{{ route('worker.skill.store') }}" method="POST">
                <div class="mt-4 mb-6">
                    @csrf
                    <div class="py-3 mb-8 dark:bg-gray-800">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Select Skills</span>
                            <select name="skill_id"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-yellow-400 focus:outline-none focus:shadow-outline-yellow dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                @foreach ($skill as $item)
                                <option value="{{ $item->id }}">{{ $item->name }} |
                                    <span>Rp. </span>{{ number_format($item->price) }}{{ $item->an }}
                                </option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                </div>
                <footer
                    class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                    <button type="submit"
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:shadow-outline-yellow">
                        Submit
                    </button>
                    <button @click="closeModal" type="button"
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-800 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                        Cancel
                    </button>
                </footer>
            </form>
        </div>
    </div>
    <!-- End of modal backdrop -->
</x-worker-layout>