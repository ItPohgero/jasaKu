<x-client-layout>
    <nav class="flex bg-yellow-500 dark:bg-gray-800 items-center justify-between gap-3 rounded-t-xl w-full p-3">
        <form method="GET">
            <input type="hidden" name="keyword" value="{{ request('keyword') }}">
            <input type="hidden" name="kota" value="show">
            <button
                class="text-xs {{ (request('kota'))? 'bg-yellow-800' : 'bg-yellow-600' }} dark:bg-gray-900 py-2 px-2 text-white rounded-lg">
                Tampilkan Kabupaten / Kota
            </button>
        </form>
        <form method="GET">
            <input type="hidden" name="keyword" value="{{ request('keyword') }}">
            <button
                class="text-xs {{ (request('kota'))? 'bg-yellow-600' : 'bg-yellow-800' }} dark:bg-gray-900 py-2 px-2 text-white rounded-lg">
                Tampilkan Kecamatan
            </button>
        </form>
    </nav>
    <div class="px-1">
        <div class="bg-gray-100 dark:bg-gray-800 dark:text-gray-300 p-3 rounded-lg my-4 text-sm lowercase">
            hay, kamu terdaftar pada lokasi {{ location_client('district')->name }},
            {{ location_client('regency')->name }}, {{ location_client('province')->name }}
        </div>
        <div class="grid grid-cols-1 gap-2 md:grid-cols-4">


            @foreach ($skill_user as $item)
            @php
            $user = \App\Models\User::whereId($item->user_id)->firstOrFail();
            $worker = \App\Models\Worker::whereUser_id($user->id)->firstOrFail();
            @endphp
            @if ((request('kota') == 'show')? location_client('province')->name == $worker->province->name &&
            location_client('regency')->name ==
            $worker->regency->name : location_client('province')->name == $worker->province->name &&
            location_client('regency')->name ==
            $worker->regency->name && location_client('district')->name == $worker->district->name)
            {{-- Batas content --}}
            <div class="rounded-lg shadow-lg">
                <div class="bg-white dark:bg-gray-800 w-full py-4 flex items-center justify-center">
                    <img class="h-32 w-32 rounded-full object-cover" src="{{ $user->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}" />
                </div>
                <div class="text-gray-700 dark:text-gray-400">
                    <div class="bg-gray-100 dark:bg-gray-700 py-3">
                        <div class="mt-2 px-2 py-1 text-sm text-center capitalize font-bold">{{ $user->name }}</div>
                        <div class="px-2 py-1 text-sm text-center text-blue-400">{{$skill->name}}</div>
                        <hr class="my-2 border-dashed">
                        <div class="px-2 py-1 text-xs italic lowercase text-center">
                            {{ $worker->district->name }},
                            {{ $worker->regency->name }}, {{ $worker->province->name }}
                        </div>
                    </div>
                    <div class="bg-full bg-gray-800 rounded-b-lg flex justify-between p-2 items-center">
                        <div class="text-white text-xs bg-yellow-600 rounded-md p-1 m-1">18762</div>
                        <a href="{{ route('client.request', ['client' => client()->code, 'worker'=> $worker->code, 'skill'=> $skill->slug]) }}"
                            class="bg-white hover:bg-yellow-600 hover:text-white p-2 rounded-lg shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            {{-- Batas content --}}
            @endif
            @endforeach
        </div>
    </div>
</x-client-layout>