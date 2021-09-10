<nav class="bg-gradient-to-r from-coklat1 via-yellow-800 to-coklat4 fixed bottom-0 w-full py-2 md:py-0">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between py-2">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/dashboard') }}"
                    class="hover:bg-coklat5 text-white px-3 py-2 rounded-md text-sm font-medium">
                    {{ Auth::user()->name }}</a>
                @else
                <a href="{{ route('login') }}"
                    class="hover:bg-coklat5 text-white px-3 py-2 rounded-md text-sm font-medium">Log
                    in</a>
                @endauth
                @endif
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <img class="block h-6 w-auto" src="{{ asset('img/logo-white.svg') }}" alt="Jasaku">
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <a href="#" class="hover:bg-coklat2 text-white px-3 py-2 rounded-md text-sm font-medium"
                            aria-current="page">Dokumentasi</a>
                    </div>
                </div>
            </div>
            <div
                class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0 gap-3">
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/dashboard') }}"
                    class="hidden lg:block hover:bg-coklat5 text-white px-3 py-2 rounded-md text-sm font-medium capitalize">
                    {{ Auth::user()->name }}</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                        class="hover:bg-coklat5 text-white px-3 py-2 rounded-md text-sm font-medium"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{__('Logout')}}
                    </a>
                </form>
                @else
                <a href="{{ route('login') }}"
                    class="hidden lg:block hover:bg-coklat5 text-white px-3 py-2 rounded-md text-sm font-medium">Log
                    in</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="hover:bg-coklat5 text-white px-3 py-2 rounded-md text-sm font-medium">Register</a>
                @endif
                @endauth
                @endif
            </div>
        </div>
    </div>
</nav>