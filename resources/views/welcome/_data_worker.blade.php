<div class="p-4">
    <div class="grid grid-cols-2 gap-2">
        @foreach ($workers as $item)
        <div class="rounded-lg shadow-lg">
            <div class="bg-white dark:bg-gray-800 w-full flex items-center justify-center rounded-lg">
                <img class="h-auto w-full rounded-t-lg  object-cover" src="{{ $item->user->profile_photo_url }}" />
            </div>
            <div class="text-gray-700 dark:text-gray-400">
                <div class="bg-gray-50 dark:bg-gray-700">
                    <div class="px-2 py-1 text-sm text-center capitalize font-bold">{{ $item->user->name }}</div>
                    <div class="px-2 text-xs text-center text-blue-400">{{ $item->user->name }}</div>
                    <hr class=" mt-1 border-dashed">
                    <div class="px-1 mb-1 text-xs lowercase text-center">
                        {{ $item->district->name }},
                        {{ $item->regency->name }}, {{ $item->province->name }}
                    </div>
                </div>
                <div class="bg-full bg-gray-800 rounded-b-lg flex justify-between p-2 items-center">
                    <div class="text-white text-xs bg-yellow-600 rounded-md p-1 m-1">18762</div>
                    <a href="" class="bg-white hover:bg-yellow-600 hover:text-white p-2 rounded-lg shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>