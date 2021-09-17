<x-guest-layout>
    <div
        class="h-full w-full sm:max-w-md  px-6 pt-20 bg-gradient-to-b from-gray-200 to-white shadow-md overflow-hidden border">
        <div class="flex justify-center">
            <img src="{{ asset('img/logo.svg') }}" class="w-6 h-6">
        </div>
        <p class="text-center mt-3">Login Jasaku.<strong>com</strong></p>
        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif
        @error('email')
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
        @enderror
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="flex justify-between items-center mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
                @if (Route::has('password.request'))
                <a class="underline text-xs text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif
            </div>
            <div class="flex items-center justify-between mt-4">
                <a href="{{ route('register') }}" class="text-xs font-bold bg-white py-1 px-3 rounded shadow-lg">
                    <span>Register!</span>
                </a>
                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </div>
</x-guest-layout>