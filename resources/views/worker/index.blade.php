<x-worker-layout>
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
        <div class="bg-white flex justify-center items-center p-3 rounded-lg shadow-lg">aASA</div>
        <div class="bg-white flex justify-center items-center p-3 rounded-lg shadow-lg">SAA</div>
        <div class="bg-white flex justify-center items-center p-3 rounded-lg shadow-lg">ghg</div>
        <div class="bg-white flex justify-center items-center p-3 rounded-lg shadow-lg">hghg</div>
        <div class="bg-white flex justify-center items-center p-3 rounded-lg shadow-lg">hgh</div>
    </div>
</x-worker-layout>