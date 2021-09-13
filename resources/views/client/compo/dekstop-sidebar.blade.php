<!-- Desktop sidebar -->
<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a href="/" class="ml-6 text-sm font-bold text-gray-800 dark:text-gray-200 capitalize">
            C - {{ Auth::user()->name }}
        </a>
        @include('client.compo._menu')
    </div>
</aside>