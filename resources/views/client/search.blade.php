<x-client-layout>
    <style>
        .rating {
            unicode-bidi: bidi-override;
            color: #c5c5c5;
            font-size: 25px;
            height: 25px;
            width: 100px;
            margin: 0 auto;
            position: relative;
            padding: 0;
            text-shadow: 0px 1px 0 #a2a2a2;
        }

        .rating-upper {
            color: #e7711b;
            padding: 0;
            position: absolute;
            display: flex;
            top: 0;
            left: 0;
            overflow: hidden;
        }

        .rating-lower {
            padding: 0;
            display: flex;
        }
    </style>
    <nav class="flex bg-gray-500 dark:bg-gray-800 items-center justify-between gap-3 shadow-lg rounded-xl w-full p-1">
        <form method="GET">
            <input type="hidden" name="keyword" value="{{ request('keyword') }}">
            <input type="hidden" name="kota" value="show">
            <button
                class="text-xs {{ (request('kota'))? 'bg-gray-800' : 'bg-gray-600' }} dark:bg-gray-900 py-2 px-2 text-white rounded-lg">
                Tampilkan Kabupaten / Kota
            </button>
        </form>
        <form method="GET">
            <input type="hidden" name="keyword" value="{{ request('keyword') }}">
            <button
                class="text-xs {{ (request('kota'))? 'bg-gray-600' : 'bg-gray-800' }} dark:bg-gray-900 py-2 px-2 text-white rounded-lg">
                Tampilkan Kecamatan
            </button>
        </form>
    </nav>
    <div class="px-1">
        <div
            class="bg-white text-gray-400 dark:bg-gray-800 dark:text-gray-300 p-3 rounded-lg my-2 text-xs text-justify shadow-lg">
            Pencarian kamu akan di filter berdasarkan lokasi kabupaten dan kecamatan dimana kamu daftarkan
            <span class="font-bold">
                {{ location_client('district')->name }},
                {{ location_client('regency')->name }},
                {{ location_client('province')->name }}
            </span>
        </div>
        <div class="grid grid-cols-2 gap-2 md:grid-cols-4">
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
            {{-- baru --}}
            <div class="w-full mx-auto max-w-xs rounded-lg overflow-hidden shadow-lg my-2 bg-white">
                <div class="relative mb-6">
                    <img class="w-full h-32 object-cover" src="{{ $user->profile_photo_url }}" />
                    <a
                        href="{{ route('client.request', ['client' => client()->code, 'worker'=> $worker->code, 'skill'=> $skill->slug]) }}">
                        <div class="text-center absolute w-full" style="bottom: -20px">
                            <button
                                class="p-3 rounded-full transition ease-in duration-200 focus:outline-none bg-gray-800 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M9 3a1 1 0 012 0v5.5a.5.5 0 001 0V4a1 1 0 112 0v4.5a.5.5 0 001 0V6a1 1 0 112 0v5a7 7 0 11-14 0V9a1 1 0 012 0v2.5a.5.5 0 001 0V4a1 1 0 012 0v4.5a.5.5 0 001 0V3z"
                                        clip-rule="evenodd" />
                                </svg>
                                </svg>
                            </button>
                        </div>
                    </a>
                </div>
                <div class="py-2 px-1 text-center tracking-wide grid grid-cols-2 gap-2">
                    <div class="posts">
                        <div style="font-size: 8pt" class="text-center">
                            {{ os($worker->id)}}/{{ oall($worker->id)}}
                        </div>
                        <p class="text-gray-400" style="font-size: 7pt;">Order Sukses</p>
                    </div>
                    <div class="posts">
                        <div style="font-size: 8pt" class="text-center">
                            {{ point($worker->id) / 10 }} Points
                        </div>
                        <p class="text-gray-400" style="font-size: 7pt;">Rata-rata</p>
                    </div>
                </div>
                <p
                    class="text-xs text-center py-1 text-gray-800 bg-gradient-to-r from-gray-200 via-red-300 to-yellow-200 capitalize">
                    {{ Auth::user()->name}}</p>
                <div class="bg-gradient-to-r from-gray-50 via-gray-100 to-gray-50 pb-2">
                    <div class="flex justify-center items-center">
                        <div class="rating">
                            <div class="rating-upper" style="width: {{ point($worker->id) }}%;">
                                <span>★</span>
                                <span>★</span>
                                <span>★</span>
                                <span>★</span>
                                <span>★</span>
                            </div>
                            <div class="rating-lower">
                                <span>★</span>
                                <span>★</span>
                                <span>★</span>
                                <span>★</span>
                                <span>★</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="font-size: 8pt" class="px-2 mb-1 mt-2 text-center font-bold">
                    <p class="text-xs text-gray-800"># {{ $skill->name }}</p>
                </div>
                <hr class="border-dashed mx-2 my-2">
                <div style="font-size: 8pt" class="px-2 mb-1">
                    <span>Alamat :</span>
                    {{ $worker->district->name }},
                    {{ $worker->regency->name }}, {{ $worker->province->name }}
                </div>
            </div>
            {{-- baru --}}
            @endif
            @endforeach
        </div>
    </div>


</x-client-layout>