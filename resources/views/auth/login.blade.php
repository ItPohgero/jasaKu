<x-guest-layout>
    <section class="text-gray-600 body-font bg-gray-100 min-h-screen">
        <div class="container xl:px-32 px-5 py-32 mx-auto flex flex-wrap items-center">
            <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
                <h1 class="title-font font-bold lg:text-7xl text-6xl text-yellow-600 text-center md:text-left ">JasaKu
                </h1>
                <p class="leading-relaxed mt-4 text-sm lg:max-w-xl font-medium  text-black text-center md:text-left ">
                    Dunia semakin komplek, waktu semakin berharga, menyelesaikan masalah yang kecil seringkali
                    menimbulkan masalah yang besar bagi sebagian orang. Jasaku hadir untuk membantu kamu dengan memberi
                    pekerjaan kepada pekerja lepas
                </p>
                <p class="text-sm text-gray-700 mt-3 text-center md:text-left "><b>Dev By Kel. 5 </b> &copy; Dignitas
                    Academy</p>

            </div>
            <div
                class="lg:w-2/6 md:w-1/2 bg-white shadow-lg rounded-lg px-8 pb-6 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
                <p class="mt-4 text-center font-bold">LOGIN</p>
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
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="current-password" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif

                        <x-jet-button class="ml-4">
                            {{ __('Log in') }}
                        </x-jet-button>
                    </div>
                </form>

            </div>
        </div>
    </section>
</x-guest-layout>