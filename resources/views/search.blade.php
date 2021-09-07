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
                <button class="text-xs bg-gray-800 py-2 px-2 text-white rounded-lg">
                    {{ location_client('regency')->name }}
                </button>
            </form>
            <form method="GET">
                <input type="hidden" name="skill_id" value="{{ request('skill_id') }}">
                <button class="text-xs bg-gray-800 py-2 px-2 text-white rounded-lg">
                    KECAMATAN {{ location_client('district')->name }}
                </button>
            </form>
        </div>

        <x-div-table>
            <table class="w-full whitespace-no-wrap">
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
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
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-sm">{{ $user->name }}</td>
                        <td class="px-4 py-3 text-sm">
                            <div>{{$skill->name}}</div>
                            <div>
                                <a href="" class="text-xs font-bold">Lihat skill lain</a>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">{{ $worker->province->name }}</td>
                        <td class="px-4 py-3 text-sm">{{ $worker->regency->name }}</td>
                        <td class="px-4 py-3 text-sm">{{ $worker->district->name }}</td>
                    </tr>
                    @endif
                    @empty
                    <td class="px-4 py-3 text-sm" colspan="6">Tidak ditemukan</td>
                    @endforelse
                </tbody>
            </table>
        </x-div-table>
    </div>
</x-guest-layout>