<nav class="sticky bottom-0 w-full">
    <div class="px-2 py-1 bg-gradient-to-r from-gray-300 via-red-100 to-gray-300 shadow-md">
        <div class="flex justify-between gap-3 p-1">
            @auth
            <x-nav-bar href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox=" 0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                        clip-rule="evenodd" />
                </svg>
            </x-nav-bar>
            @else
            <x-nav-bar href="{{ route('login') }}" :active="request()->routeIs('login')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                </svg>
            </x-nav-bar>
            @endauth
            <x-nav-bar href="{{ route('soon') }}" :active="request()->routeIs('soon')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox=" 0 0 20 20" fill="currentColor">
                    <path
                        d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z" />
                </svg>
            </x-nav-bar>
            <a href="/" class="flex justify-center items-center animate-pulse">
                <img src="{{ asset('img/mlogo.svg') }}" class="h-7">
            </a>
            <x-nav-bar href="{{ route('soon') }}" :active="request()->routeIs('soon')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox=" 0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5 5a3 3 0 015-2.236A3 3 0 0114.83 6H16a2 2 0 110 4h-5V9a1 1 0 10-2 0v1H4a2 2 0 110-4h1.17C5.06 5.687 5 5.35 5 5zm4 1V5a1 1 0 10-1 1h1zm3 0a1 1 0 10-1-1v1h1z"
                        clip-rule="evenodd" />
                    <path d="M9 11H3v5a2 2 0 002 2h4v-7zM11 18h4a2 2 0 002-2v-5h-6v7z" />
                </svg>
            </x-nav-bar>
            @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="px-3 py-2 rounded-xl flex items-center justify-center text-red-400"
                    href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox=" 0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </form>
            @else
            <x-nav-bar href="{{ route('terms.show') }}" :active="request()->routeIs('terms.show')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox=" 0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                        clip-rule="evenodd" />
                </svg>
            </x-nav-bar>
            @endauth
        </div>
    </div>
</nav>