<label class="block text-sm mt-4">
    <span class="text-gray-700 dark:text-gray-400">Kabupaten / Kota</span>
    <select onchange="regency()" id="regencyid" name="regency_id" class="block w-full dark:bg-gray-700 border-gray-300
focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

        @foreach($regency as $item)

        <option value="{{$item->id}}">{{$item->name}}</option>

        @endforeach

    </select>
</label>