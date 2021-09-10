<x-client-layout>
    <section class="text-gray-600 body-font">
        <div class="container flex flex-wrap px-5 py-6 mx-auto bg-white rounded-2xl shadow-lg">
            <div
                class="w-full md:w-1/2 md:pr-12 md:py-8 md:border-b-0 mb-10 md:mb-0 pb-10 bg-gradient-to-t from-yellow-100 to-gray-100 shadow-lg rounded-2xl p-3">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900 capitalize">
                    {{ $dataClient->name }}
                </h1>
                <div class="flex justify-between">
                    <div>
                        <h1 class="font-bold text-green-500">Request oleh</h1>
                        <span>{{ $dataClient->user->name }}</span>
                    </div>
                    <div>
                        <h1 class="font-bold text-green-500">Order ke</h1>
                        <span>{{ $dataWorker->user->name }}</span>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-dashed">
                    Skill request <strong>{{ $skill->name }}</strong>
                </div>
                <div class="mt-4">
                    <p>Skill lain yang dimiliki</p>
                    @foreach ($skill_other->skills as $item)
                    <div class="grid grid-cols-3 text-sm capitalize my-1 border-b border-dashed pb-2">
                        <span class="font-bold">* {{ $item->name }}</span>
                        <span>1 <span class="text-xs"><sub>Order</sub></span></span>
                        <span>186 <span class="text-xs"><sub>Point</sub></span></span>
                    </div>
                    @endforeach
                </div>
                <p class="mt-3 text-xs text-justify">*Untuk melihat detail lebih jauh terkait profile</p>
            </div>
            <div class="flex flex-col md:w-1/2 md:pl-12 w-full">
                <h2 class="title-font font-semibold text-gray-800 tracking-wider text-sm mb-3">Request</h2>
                <form action="{{ route('client.order') }}" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="client_id" value="{{ $dataClient->id }}">
                    <input type="hidden" name="worker_id" value="{{ $dataWorker->id }}">
                    <input type="hidden" name="skill_id" value="{{ $skill->id }}">
                    <div>
                        <label for="date" class="text-xs">Tanggal dan jam dimulai kerja</label>
                        <input type="date" id="date" name="date" class="w-full mt-2 dark:bg-gray-700 border-gray-300
focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <input type="time" name="time" class="w-full mt-2 dark:bg-gray-700 border-gray-300
focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    </div>
                    <div class="mt-2">
                        <label for="phone" class="text-xs">Phone <span
                                class="text-xs text-red-400">*optional</span></label>
                        <input type="text" id="phone" name="phone" class="w-full mt-2 dark:bg-gray-700 border-gray-300
focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    </div>
                    <div class="mt-2">
                        <label for="date" class="text-xs">Catatan</label>
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