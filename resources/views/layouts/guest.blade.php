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
    <div class="sticky top-0 bg-red-400 py-3 text-center text-xs text-white z-50">
        Dignitas Academy | Kelompok 5
    </div>
    <div class="flex justify-center bg-gradient-to-r from-gray-100 via-red-100 to-purple-100">
        <div class="sm:w-96 w-full min-h-screen bg-white  shadow-lg">
            {{ $slot }}
            <x-navbar-guest></x-navbar-guest>
        </div>
    </div>
</body>

</html>