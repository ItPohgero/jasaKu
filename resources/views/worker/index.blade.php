<x-worker-layout>
    <div class="mb-3">
        <img src="{{ asset('img/bgworker.jpg') }}" class="rounded-lg">
    </div>
    <div class="grid grid-cols-2 gap-3 text-xs">
        @if (\App\Models\Worker::whereUser_id(Auth::user()->id)->whereNik(null)->first())
        <a href="{{ route('worker.edit') }}"
            class="bg-white flex justify-center gap-2 items-center px-4 py-3 text-left rounded-lg shadow-lg text-red-500 font-bold">
            <span>Akun belum terverifikasi</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                    clip-rule="evenodd" />
            </svg>
        </a>
        @else
        <a href="{{ route('worker.show') }}"
            class="bg-white flex justify-center gap-2 items-center px-4 py-3 text-left rounded-lg shadow-lg text-green-500 font-bold">
            <span>Akun terverifikasi</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd" />
            </svg>
        </a>
        @endif
        <div class="bg-white flex justify-center items-center p-3 rounded-lg shadow-lg">
            <div class="block">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto mb-2 text-yellow-600" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M9.243 3.03a1 1 0 01.727 1.213L9.53 6h2.94l.56-2.243a1 1 0 111.94.486L14.53 6H17a1 1 0 110 2h-2.97l-1 4H15a1 1 0 110 2h-2.47l-.56 2.242a1 1 0 11-1.94-.485L10.47 14H7.53l-.56 2.242a1 1 0 11-1.94-.485L5.47 14H3a1 1 0 110-2h2.97l1-4H5a1 1 0 110-2h2.47l.56-2.243a1 1 0 011.213-.727zM9.03 8l-1 4h2.938l1-4H9.031z"
                        clip-rule="evenodd" />
                </svg>
                <div>
                    {{ point(worker()->id)}}
                    Point Rata Rata
                </div>
            </div>
        </div>
        <div class="bg-white flex justify-center items-center p-3 rounded-lg shadow-lg">
            <div class="block">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto mb-2 text-purple-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
                <div>
                    {{ os(worker()->id)}}/{{ oall(worker()->id)}}
                    Order Sukses
                </div>
            </div>
        </div>
        <div class="bg-white flex justify-center items-center p-3 rounded-lg shadow-lg">
            <div class="block">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto mb-2 text-red-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                <div>
                    {{ og(worker()->id)}}/{{ oall(worker()->id)}}
                    Order Ditolak
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3 bg-white flex justify-center items-center p-3 rounded-lg shadow-lg text-xs font-bold">
        {{ \App\Models\Request::whereWorker_id(worker()->id)->whereStatus(false)->count() }} Request belum di jawab
    </div>
</x-worker-layout>