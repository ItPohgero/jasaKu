<x-client-layout>
    <x-div-table>
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Invoice</th>
                    <th class="px-4 py-3">Worker / Skill Request</th>
                    <th class="px-4 py-3">Date / Request</th>
                    <th class="px-4 py-3">Notes</th>
                    <th class="px-4 py-3">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @forelse ($attr as $item)
                <tr class="text-gray-700 dark:text-gray-400 {{ ($item->status == false) ?'bg-red-100' : 'bg-white' }}">
                    <td class="px-4 py-3">
                        <span class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div class="relative hidden w-8 h-8 mr-3 p-1 rounded-full md:block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full rounded-full" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    {{ $item->invoice }}
                                </p>
                            </div>
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm capitalize">
                        {{ $item->worker->user->name }}
                        <div>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                {{ $item->skill->name }}
                            </p>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $item->date }}
                        <div>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                {{ $item->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $item->notes }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        @if ($item->status == true)
                        @if($item->point == null)
                        <p>Active | Berikan penilaian dan akhiri</p>
                        <hr class="py-1 my-1 border-t border-dashed">
                        <div class="flex justify-between">
                            <a href=""
                                class="bg-green-700 hover:bg-green-800 py-1 px-3 text-xs rounded text-white">Chat</a>
                            <button @click="openModal"
                                class="bg-gray-700 hover:bg-gray-800 py-1 px-3 text-xs rounded text-white">Feedback</button>
                        </div>
                        @else
                        <p>Selesai, Feedback <span
                                class="bg-gray-800 py-1 px-3 text-xs text-white rounded-lg">{{$item->point}}
                                Point</span></p>
                        @endif
                        @else
                        <p class="bg-yellow-600 py-1 text-center px-3 rounded text-white">Sedang memohon</p>
                        @endif
                    </td>
                </tr>
                @empty
                <td class="px-4 py-3 text-sm" colspan="6">
                    <p class="text-red-500 text-xs">Data tidak ditemukan</p>
                </td>
                @endforelse
            </tbody>
        </table>
    </x-div-table>
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
            <header class="flex justify-end">
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
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Modal header
                </p>
                <!-- Modal description -->
                <p class="text-sm text-gray-700 dark:text-gray-400">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum et
                    eligendi repudiandae voluptatem tempore!
                </p>
            </div>
            <footer
                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <button @click="closeModal"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-800 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancel
                </button>
                <button
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-800 transition-colors duration-150 bg-yellow-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:shadow-outline-yellow">
                    Accept
                </button>
            </footer>
        </div>
    </div>
    <!-- End of modal backdrop -->
</x-client-layout>