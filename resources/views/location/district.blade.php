<label class="block text-sm mt-4">
    <span class="text-gray-700 dark:text-gray-400">District / Kecamatan</span>
    <select name="district_id" class="block w-full dark:bg-gray-700 border-gray-300
focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

        @foreach($district as $item)

        <option value="{{$item->id}}">{{$item->name}}</option>

        @endforeach

    </select>
</label>
<div class="flex justify-end mt-6 text-sm">
    <button class="py-2 px-4 bg-gray-800 text-white rounded-md" type="submit">Submit</button>
</div>