<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }}</title>
    <link rel="shortcut icon" href="{{ asset('img/logo.svg') }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body>
    <div class="flex justify-center bg-gradient-to-b from-gray-100 via-red-100 to-white">
        <div class="sm:w-3/12 w-full min-h-screen bg-white  shadow-lg">
            <div class="sticky flex items-center top-0 bg-gray-200 py-2 text-center text-xs z-50 px-3 text-gray-600">
                <div class="mr-3">
                    <img src="{{ asset('img/mlogo-horizontal.svg') }}" class="w-auto h-6">
                </div>
                <div class="flex justify-center items-center bg-gray-100 rounded-full gap-2 w-full">
                    <form action="{{ route('search') }}" method="get" class="w-full flex gap-2">
                        <select name="keyword"
                            class="w-full border-none text-xs focus:ring focus:ring-gray-200 focus:ring-opacity-0 rounded-full py-1 bg-gray-100">
                            @foreach (App\Models\Skill::get() as $item)
                            <option value="{{ $item->slug }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <button class="p-2 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            {{ $slot }}
            <x-navbar-guest-client />
        </div>
    </div>
</body>

</html>