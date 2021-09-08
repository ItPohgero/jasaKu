<!-- Desktop sidebar -->
<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <span class="ml-6 text-sm font-bold text-gray-800 dark:text-gray-200 capitalize">
            {{ env('APP_NAME') }}
        </span>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('admin') }}" :active="request()->routeIs('admin')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </x-nav-link>
            </li>
        </ul>
        <ul>
            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('admin.worker') }}" :active="request()->routeIs('admin.worker')">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                    <span class="ml-4 flex w-full justify-between items-center">
                        <span>Worker</span>
                        <div class="text-xs">
                            <span class="text-green-500">{{ \App\Models\Worker::count() }} <small>Orang</small></span>
                        </div>
                    </span>
                </x-nav-link>
            </li>
            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('admin.client') }}" :active="request()->routeIs('admin.client')">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span class="ml-4 flex w-full justify-between items-center">
                        <span>Client</span>
                        <div class="text-xs">
                            <span class="text-green-500">{{ \App\Models\Client::count() }} <small>Orang</small></span>
                        </div>
                    </span>
                </x-nav-link>
            </li>
            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('admin.skill') }}" :active="request()->routeIs('admin.skill')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span class="ml-4">Skill</span>
                </x-nav-link>
            </li>
            <li class="relative px-6 py-3 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                        clip-rule="evenodd" />
                </svg>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="text-sm font-semibold ml-4" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{__('Logout')}}
                    </a>
                </form>
            </li>
        </ul>
    </div>
</aside>