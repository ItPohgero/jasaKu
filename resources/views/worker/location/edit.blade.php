<x-worker-layout>
    <form action="{{ route('worker.location.update') }}" method="POST">
        @csrf
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Provinsi</span>
                <select onchange="province()" id="provinceid" name="province_id"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">

                    <option selected>Pilih</option>
                    @foreach($province as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>

                    @endforeach

                </select>
            </label>
            <div id="regencyShow"></div>
            <div id="districtShow"></div>
            <div class="flex justify-end mt-6 text-sm">
                <button class="py-2 px-4 bg-gray-800 text-white rounded-md" type="submit">Submit</button>
            </div>
        </div>
    </form>
    <x-location-ajax></x-location-ajax>
</x-worker-layout>