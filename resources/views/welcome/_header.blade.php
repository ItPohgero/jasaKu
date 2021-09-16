<section class="pt-3 px-4 w-full">
    <div class="flex justify-between items-center mb-2">
        <div>
            <div style="font-size: 7pt;" class="text-gray-400">Hallo,</div>
            @auth
            <div class="text-xs font-bold capitalize">{{ Auth::user()->name }}</div>
            @else
            <div class="text-xs font-bold capitalize">Guys! kamu belum login, atau register dulu</div>
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
            <a href="{{ route('profile.show') }}">
                <img src="{{ asset('img/user.svg') }}" class="w-8 h-auto">
            </a>
            @endauth
        </div>
    </div>
</section>