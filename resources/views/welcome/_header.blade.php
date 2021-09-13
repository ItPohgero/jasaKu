<section class="py-3 px-4 w-full">
    <div class="flex justify-between items-center mb-2">
        <div>
            <div class="text-xs text-gray-400">Hallo,</div>
            @auth
            <div class="text-xs font-bold capitalize">{{ Auth::user()->name }}</div>
            @else
            <div class="text-xs font-bold capitalize">Guys! register dulu</div>
            @endauth
        </div>
        <div>
            @auth
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <a href="{{ route('profile.show') }}"
                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                    alt="{{ Auth::user()->name }}" />
            </a>
            @else
            <span class="inline-flex rounded-md">
                <a href="{{ route('profile.show') }}"
                    class="shadow uppercase inline-flex items-center ml-1 px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-gray-500 bg-gray-100 dark:bg-gray-700 hover:text-gray-700 focus:outline-none transition">
                    {{ Str::limit(Auth::user()->name, 1, '') }}
                </a>
            </span>
            @endif
            @else
            <a href="{{ route('profile.show') }}"
                class="shadow uppercase inline-flex items-center p-1 border border-transparent text-sm leading-4 font-medium rounded-full text-gray-500 bg-gray-100 dark:bg-gray-700 hover:text-gray-700 focus:outline-none transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                        clip-rule="evenodd" />
                </svg>
            </a>
            @endauth
        </div>
    </div>
    <hr class="border-dashed pb-3 border-gray-400">
    <div class="w-full">
        <div class="flex justify-center items-center bg-white rounded-xl p-1 gap-2 w-full">
            <form action="{{ route('search') }}" method="get" class="w-full flex gap-2">
                <select name="keyword" class="w-full dark:bg-gray-700 border-white text-xs
                    focus:border-yellow-300 focus:ring focus:ring-yellow-200 focus:ring-opacity-20 rounded-lg py-1">
                    @foreach (App\Models\Skill::get() as $item)
                    <option value="{{ $item->slug }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <button class="p-2 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</section>