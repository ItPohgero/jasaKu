<label class="block text-sm mt-4">
    <span class="text-gray-700 dark:text-gray-400">District / Kecamatan</span>
    <select name="district_id"
        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">

        @foreach($district as $item)

        <option value="{{$item->id}}">{{$item->name}}</option>

        @endforeach

    </select>
</label>