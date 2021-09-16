<x-client-layout>
    <section class="text-gray-600 body-font px-3">
        <div class="container flex flex-wrap px-5 py-6 mx-auto bg-white rounded-2xl shadow-lg">
            <div class="w-full md:w-1/2 md:pr-12 md:py-8 md:border-b-0 mb-5 md:mb-0">
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
                <h2
                    class="title-font font-semibold text-white tracking-wider text-xs mb-3 bg-yellow-300 text-center py-2 mt-3">
                    Skill request <strong>{{ $skill->name }}</strong></h2>
                <div class="mt-4">
                    <p class="text-xs">Skill lain yang dimiliki</p>
                    @foreach ($skill_other->skills as $item)
                    <div class="flex justify-between items-center text-sm capitalize my-1 border-b border-dashed pb-2">
                        <span class="font-bold text-xs">* {{ $item->name }}</span>
                        <span>186 <span class="text-xs"><sub></sub></span></span>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="flex flex-col md:w-1/2 md:pl-12 w-full mt-3">
                <h2
                    class="title-font font-semibold text-white tracking-wider text-xs mb-3 bg-purple-300 text-center py-2">
                    Request</h2>
                <form action="{{ route('client.order') }}" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="client_id" value="{{ $dataClient->id }}">
                    <input type="hidden" name="worker_id" value="{{ $dataWorker->id }}">
                    <input type="hidden" name="skill_id" value="{{ $skill->id }}">
                    <div>
                        <div class="mt-2">
                            <label for="date" class="text-xs">Tanggal kerja</label>
                            <input type="date" id="date" name="date"
                                class="w-full mt-2 dark:bg-gray-700 border-gray-300
                            focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        </div>
                        <div class="mt-2">
                            <label for="time" class="text-xs">Waktu kerja</label>
                            <input type="time" name="time" required
                                class="w-full mt-2 dark:bg-gray-700 border-gray-300
                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        </div>

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