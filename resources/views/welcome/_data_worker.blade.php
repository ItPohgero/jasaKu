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
<div class="p-4">
    <div class="grid grid-cols-2 gap-2">
        @foreach ($workers as $item)
        <div class="w-full mx-auto max-w-xs rounded-lg overflow-hidden shadow-lg my-2 bg-white">
            <div class="relative mb-6">
                <img class="w-full h-32 object-cover" src="{{ $item->user->profile_photo_url }}" />
                <div class="text-center absolute w-full" style="bottom: -20px">
                    <button
                        class="p-3 rounded-full transition ease-in duration-200 focus:outline-none bg-gradient-to-r from-yellow-400 to-red-300 shadow-lg">
                        <svg viewBox="0 0 20 20" enable-background="new 0 0 20 20" class="w-4 h-4">
                            <path fill="#FFFFFF" d="M16,10c0,0.553-0.048,1-0.601,1H11v4.399C11,15.951,10.553,16,10,16c-0.553,0-1-0.049-1-0.601V11H4.601
                                     C4.049,11,4,10.553,4,10c0-0.553,0.049-1,0.601-1H9V4.601C9,4.048,9.447,4,10,4c0.553,0,1,0.048,1,0.601V9h4.399
                                     C15.952,9,16,9.447,16,10z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="py-2 px-1 text-center tracking-wide grid grid-cols-2 gap-2">
                <div class="posts">
                    <div style="font-size: 8pt" class="text-center">
                        {{ os($item->id)}}/{{ oall($item->id)}}
                    </div>
                    <p class="text-gray-400" style="font-size: 7pt;">Order Sukses</p>
                </div>
                <div class="posts">
                    <div style="font-size: 8pt" class="text-center">
                        {{ point($item->id) }} / 100
                    </div>
                    <p class="text-gray-400" style="font-size: 7pt;">X Points</p>
                </div>
            </div>
            <p
                class="text-xs text-center py-1 text-gray-800 bg-gradient-to-r from-gray-200 via-red-300 to-yellow-200 capitalize">
                {{ $item->user->name }}</p>
            <div class="bg-gradient-to-r from-gray-50 via-gray-100 to-gray-50 pb-2">
                <div class="flex justify-center items-center">
                    <div class="rating">
                        <div class="rating-upper" style="width: {{ point($item->id) }}%;">
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
            <div style="font-size: 8pt" class="px-2 mb-1 mt-2">
                @forelse ($item->user->skills as $aa)
                <p class="text-xs text-gray-800"># {{ $aa->name }}</p>
                @empty
                <p class="text-xs text-gray-800">Skill worker tidak ditemukan.</p>
                @endforelse
            </div>
            <hr class="border-dashed mx-2 my-2">
            <div style="font-size: 8pt" class="px-2 mb-1">
                <span>Alamat :</span>
                {{ $item->district->name }},
                {{ $item->regency->name }}, {{ $item->province->name }}
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-5">
        {{ $workers->links() }}
    </div>
</div>