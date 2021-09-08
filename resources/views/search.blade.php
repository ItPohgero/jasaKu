<x-guest-layout>
    <nav class="w-full bg-yellow-400 py-2 px-6 flex justify-between">
        <div>
            <img src="{{ asset('img/logo-white.svg') }}" class="w-8">
        </div>
    </nav>
    <div class="px-5">
        <div class="bg-gray-100 py-3 rounded-sm mt-4 px-4">
            <p>Informasi Pengguna</p>
            <table class="w-full">
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>{{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <td>Register</td>
                        <td>{{ client()->code }}</td>
                    </tr>
                    <tr>
                        <td>Provinsi</td>
                        <td>{{ location_client('province')->name }}</td>
                    </tr>
                    <tr>
                        <td>Kabupaten / Kota</td>
                        <td>{{ location_client('regency')->name }}</td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td>{{ location_client('district')->name }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex justify-between items-center my-3">
            <form method="GET">
                <input type="hidden" name="skill_id" value="{{ request('skill_id') }}">
                <input type="hidden" name="kota" value="show">
                <button class="text-xs bg-gray-600 py-2 px-2 text-white rounded-lg">
                    Kabupaten / Kota
                </button>
            </form>
            <form method="GET">
                <input type="hidden" name="skill_id" value="{{ request('skill_id') }}">
                <button class="text-xs bg-gray-600 py-2 px-2 text-white rounded-lg">
                    Kecamatan
                </button>
            </form>
        </div>
        <div class="grid grid-cols-2 gap-2 md:grid-cols-4">
            @forelse ($skill_user as $item)
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
            <div class="bg-gray-100 rounded-lg">
                <div class="bg-gray-200 w-full rounded-lg py-2 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="text-gray-700 dark:text-gray-400">
                    <div>
                        <div class="px-2 py-1 text-sm">{{ $user->name }}</div>
                        <div class="px-2 py-1 text-sm font-bold">{{$skill->name}}</div>
                        <div class="px-2 py-1 text-xs mt-3">
                            {{ $worker->district->name }},
                            {{ $worker->regency->name }}, {{ $worker->province->name }}
                        </div>
                    </div>
                    <div class="bg-full bg-gray-400 rounded-b-lg flex justify-between px-1 items-center">
                        <div class="text-white text-xs bg-yellow-600 rounded-md p-1 m-1">18762</div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Batas content --}}
            @endif
            @empty
            <td class="px-4 py-3 text-sm" colspan="6">Tidak ditemukan</td>
            @endforelse
        </div>
    </div>
</x-guest-layout>