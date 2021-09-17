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
    <section class="text-gray-600 body-font px-3">
        <div class="container flex flex-wrap px-5 py-6 mx-auto bg-white rounded-2xl shadow-lg">
            <div class="w-full md:w-1/2 md:pr-12 md:py-8 md:border-b-0 mb-5 md:mb-0">
                <div class="flex justify-between mb-3">
                    <div class="text-left">
                        <h1 class="font-bold text-xs text-green-500">Request oleh</h1>
                        <span class="text-sm">{{ $dataClient->user->name }}</span>
                    </div>
                    <div class="text-right">
                        <h1 class="font-bold text-xs text-green-500">Order ke</h1>
                        <span class="text-sm">{{ $dataWorker->user->name }}</span>
                    </div>
                </div>
                <div class="w-full">
                    <div x-data={show:false} class="rounded-sm">
                        <div class="bg-gray-100 py-2 rounded-t-lg  flex justify-between px-4" id="headingOne">
                            <span class="text-xs">Informasi Worker</span>
                            <button @click="show=!show" type="button">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </div>
                        <div x-show="show" class="p-2 text-xs bg-gray-50">
                            <main class="py-3">
                                <div class="bg-gradient-to-r from-gray-50 via-gray-100 to-gray-50 pb-2">
                                    <div class="flex justify-center items-center">
                                        <div class="rating">
                                            <div class="rating-upper"
                                                style="width: {{ point($dataWorker->user->id) }}%;">
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
                                <div class="pb-2 tracking-wide flex justify-between gap-2">
                                    <div class="posts">
                                        <div>
                                            {{ os($dataWorker->id)}}/{{ oall($dataWorker->id)}}
                                        </div>
                                        <p class="text-gray-400" style="font-size: 7pt;">Order Sukses</p>
                                    </div>
                                    <div class="posts">
                                        <div>
                                            {{ point($dataWorker->id) }} / 100
                                        </div>
                                        <p class="text-gray-400" style="font-size: 7pt;">X Points</p>
                                    </div>
                                </div>
                                <hr class="border-dashed my-3">
                                <div class="grid grid-cols-2 gap-2 mb-2">
                                    <div class="capitalize">Nama :</div>
                                    <div class="capitalize">{{ $dataWorker->user->name }}</div>
                                    <div class="capitalize">Provinsi</div>
                                    <div class="capitalize">{{ $dataWorker->province->name }}</div>
                                    <div class="capitalize">Kabupaten / Kota</div>
                                    <div class="capitalize">{{ $dataWorker->regency->name }}</div>
                                    <div class="capitalize">Kecamatan</div>
                                    <div class="capitalize">{{ $dataWorker->district->name }}</div>
                                </div>
                                @foreach ($skill_other->skills as $item)
                                <div
                                    class="flex justify-between items-center text-sm capitalize my-1 border-b border-dashed pb-2">
                                    <span class="font-bold text-xs">* {{ $item->name }}</span>
                                    <span class="text-xs">186 <span></span>
                                </div>
                                @endforeach
                            </main>
                        </div>
                    </div>
                    <div x-data={show:false} class="rounded-sm">
                        <div class="bg-gray-100 py-2 flex justify-between px-4" id="headingOne">
                            <span class="text-xs">Detail Request</span>
                            <button @click="show=!show" type="button">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </div>
                        <div x-show="show" class="p-2 text-xs">
                            <main class="py-3">
                                <p class="text-justify">
                                    Kamu request skill <strong>{{ $skill->name }}</strong> kepada
                                    <strong>{{ $dataWorker->user->name }}</strong></p>
                                <hr class="border-dashed my-2">
                                <p class="mt-2 text-justify">Harga tawar untuk keterampilan diangka
                                    Rp. {{ number_format($skill->price) }}{{ $skill->an }}. Kamu bisa menawarnya pada
                                    form request</p>
                            </main>
                        </div>
                    </div>
                    <div x-data={show:false} class="rounded-sm">
                        <div class="bg-gray-100 py-2 rounded-b-lg  flex justify-between px-4" id="headingOne">
                            <span class="text-xs">Informasi Aturan</span>
                            <button @click="show=!show" type="button">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </div>
                        <div x-show="show" class="p-2">
                            <main class="text-xs">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                squid. 3 wolf moon
                                officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                eiusmod. Brunch 3
                                wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                assumenda
                                shoreditch et.
                                Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                                proident. Ad vegan
                                excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                                aesthetic
                                synth nesciunt
                                you probably haven't heard of them accusamus labore sustainable VHS.
                                </mian>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:w-1/2 md:pl-12 w-full">
                <h2
                    class="title-font font-semibold text-white tracking-wider text-xs mb-3 bg-purple-300 text-center py-2 rounded">
                    Form Request
                </h2>
                <h2 class="grid grid-cols-2 gap-2 items-center text-xs">
                    <span>Biaya Tambahan Luar Kecamatan</span>
                    <span>Rp.
                        @php
                        $cek = ($dataWorker->district->id == location_client('district')->id) ? 0 : 20000

                        @endphp
                        {{ number_format($cek) }}
                    </span>
                    <span>Biaya Awal</span>
                    <span>Rp {{number_format($skill->price) }}</span>
                    <span>Total</span>
                    <span class="font-bold">Rp {{ number_format($skill->price + $cek) }}</span>
                </h2>
                <hr class="my-3 border-dashed">
                <form action="{{ route('client.order') }}" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="client_id" value="{{ $dataClient->id }}">
                    <input type="hidden" name="worker_id" value="{{ $dataWorker->id }}">
                    <input type="hidden" name="skill_id" value="{{ $skill->id }}">
                    <div>
                        <div class class="text-xs mt-2">
                            <label class="text-xs" for="date">Tanggal kerja</label>
                            <input type="date" id="date" name="date"
                                class="w-full mt-2 dark:bg-gray-700 border-gray-300
                            focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        </div>
                        <div class class="text-xs mt-2">
                            <label class="text-xs" for="time">Waktu kerja</label>
                            <input type="time" name="time" required
                                class="w-full mt-2 dark:bg-gray-700 border-gray-300
                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        </div>
                        <div class class="text-xs mt-2">
                            <label class="text-xs" for="offer">Tawar Harga (Harga awal
                                Rp {{ number_format($skill->price + $cek) }})</label>
                            <input type="number" name="offer" required
                                class="w-full mt-2 dark:bg-gray-700 border-gray-300
                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        </div>

                    </div>
                    <div class class="text-xs mt-2">
                        <label class="text-xs" for="phone">Phone <span
                                class="text-xs text-red-400">*optional</span></label>
                        <input type="text" id="phone" name="phone" class="w-full mt-2 dark:bg-gray-700 border-gray-300
focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    </div>
                    <div class class="text-xs mt-2">
                        <label class="text-xs" for="date">Catatan</label>
                        <textarea name="notes" cols="5" rows="4" class="p-3 w-full dark:bg-gray-700 border-gray-300
focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                        <x-error for="notes" />
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="bg-gray-800 py-2 px-5 rounded-lg text-white">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-client-layout>