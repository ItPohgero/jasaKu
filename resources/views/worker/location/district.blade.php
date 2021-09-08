<label class="block text-sm mt-4">
    <span class="text-gray-700 dark:text-gray-400">District / Kecamatan</span>
    <select name="district_id"
        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">

        @foreach($district as $item)

        <option value="{{$item->id}}">{{$item->name}}</option>

        @endforeach

    </select>
</label>
<div class="text-right space-x-5 mt-5">
    <button
        class="px-4 py-2 text-sm bg-white rounded-lg border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-gray-50 focus:bg-indigo-50 focus:text-indigo"
        type="submit">Update</button>
</div>