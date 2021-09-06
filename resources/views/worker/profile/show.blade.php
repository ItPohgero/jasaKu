<x-worker-layout>
    <section class="text-gray-600 body-font">
        <span
            class="flex items-center justify-between p-4 mb-4 text-sm font-semibold text-yellow-100 bg-gradient-to-r from-yellow-600 to-yellow-400 rounded-lg shadow-md focus:outline-none focus:shadow-outline-yellow">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                    </path>
                </svg>
                <span class="uppercase">{{ worker()->code }}</span>
            </div>
            <button @click="openModal" class="bg-yellow-500 text-white py-1 px-4 rounded-full shadow-sm">Edit
                Profile</button>
        </span>
        <div class="container flex flex-wrap px-5 py-6 mx-auto items-center bg-white rounded-2xl shadow-lg">
            <div
                class="w-full md:w-1/2 md:pr-12 md:py-8 md:border-b-0 mb-10 md:mb-0 pb-10 bg-gradient-to-t from-yellow-100 to-gray-100 shadow-lg rounded-2xl p-3">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900 capitalize">
                    {{ worker()->name }}
                </h1>
                <div class="flex justify-between">
                    <div>
                        <h1 class="font-bold text-green-500">Feedback Point</h1>
                        <span>18756</span>
                    </div>
                    <div>
                        <h1 class="font-bold text-green-500">Customer</h1>
                        <span>645</span>
                    </div>
                </div>
                <p class="mt-3 text-xs text-justify">*Untuk melihat detail lebih jauh terkait profile, silahkan pergi ke
                    settings</p>
            </div>
            <div class="flex flex-col md:w-1/2 md:pl-12">
                <h2 class="title-font font-semibold text-gray-800 tracking-wider text-sm mb-3">PROFILE</h2>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-3">
                    <h2 class="text-sm capitalize"><span class="font-bold text-yellow-800">NIK</span> :
                        {{ worker()->nik }} </h2>
                    <h2 class="text-sm capitalize"><span class="font-bold text-yellow-800">Email</span> :
                        {{ auth::user()->email }} </h2>
                    <h2 class="text-sm capitalize"><span class="font-bold text-yellow-800">Born</span> :
                        {{ worker()->born }} </h2>
                    <h2 class="text-sm capitalize"><span class="font-bold text-yellow-800">Description</span> :
                        {{ worker()->desc }}
                    </h2>
                </div>
            </div>
        </div>
    </section>
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
                    Edit Profile {{ worker()->name }}
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
            <form action="{{ route('worker.update', worker()->user_id) }}" method="POST">
                <div class="mt-4 mb-6">
                    <!-- Modal title -->

                    <!-- Modal description -->
                    @csrf
                    @method('patch')
                    <div class="px-4 py-3 mb-8 dark:bg-gray-800">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">NIK (Nomor Induk Keluarga)</span>
                            <input
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-yellow-400 focus:outline-none focus:shadow-outline-yellow dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                name="nik" type="text" value="{{ worker()->nik }}" required />
                        </label>
                        <label class="block text-sm mt-4">
                            <span class="text-gray-700 dark:text-gray-400">Tanggal Lahir</span>
                            <input
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-yellow-400 focus:outline-none focus:shadow-outline-yellow dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                name="born" type="date" value="{{ worker()->born }}" required />
                        </label>
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Description</span>
                            <textarea
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-yellow-400 focus:outline-none focus:shadow-outline-yellow dark:focus:shadow-outline-gray"
                                name="desc" rows="3" required>{{ worker()->desc }}</textarea>
                        </label>
                    </div>
                </div>
                <footer
                    class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                    <button @click="closeModal" type="button"
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-800 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                        Cancel
                    </button>
                    <button type="submit"
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:shadow-outline-yellow">
                        Submit
                    </button>
                </footer>
            </form>
        </div>
    </div>
    <!-- End of modal backdrop -->
</x-worker-layout>