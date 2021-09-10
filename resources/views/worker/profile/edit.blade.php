<x-worker-layout>
    <form action="{{ route('worker.update', worker()->user_id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">NIK (Nomor Induk Keluarga)</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="nik" type="text" placeholder="xxxxxx" value="{{ old('nik') }}" />
                <x-error for="nik"></x-error>
            </label>
            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Tanggal Lahir</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="born" type="date" placeholder="00-00-0000" />
                <x-error for="born"></x-error>
            </label>
            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Phone</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="phone" type="text" placeholder="08x xxx xxx xxx" />
                <x-error for="phone"></x-error>
            </label>
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Description</span>
                <textarea
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="desc" rows="3" placeholder="Deskripsikan tentang anda"></textarea>
                <x-error for="desc"></x-error>
            </label>

            <div class="flex justify-end mt-6 text-sm">
                <button class="py-2 px-4 bg-gray-800 text-white rounded-md" type="submit">Submit</button>
            </div>
        </div>
    </form>
</x-worker-layout>