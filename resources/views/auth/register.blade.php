<x-guest-layout>
    <section class="text-gray-600 body-font bg-gray-100 min-h-screen">
        <div class="container xl:px-32 px-5 py-16 mx-auto flex flex-wrap items-center">
            <div class="lg:w-2/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
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
                class="lg:w-3/6 md:w-1/2 bg-white shadow-lg rounded-lg px-8 pb-6 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
                <p class="mt-4 text-center font-bold">REGISTER</p>
                @error('terms')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mt-3">
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                            autofocus autocomplete="name" />
                        @error('name')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" />
                        @error('email')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div x-data="{ show: true }">
                        <div class="mt-3">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <input id="password" :type="show ? 'password' : 'text'"
                                class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                name="password" autocomplete="new-password">

                        </div>
                        <div class="mt-3">
                            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <input id="password_confirmation" :type="show ? 'password' : 'text'"
                                class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                name="password_confirmation" autocomplete="new-password">

                        </div>
                        @error('password')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                        <div class="mt-2 flex justify-end">
                            <button type="button" class="text-xs rounded bg-gray-100 py-1 px-4" @click="show = !show"
                                :class="{'hidden': !show, 'block':show }">Show Password</button>
                            <button type="button" class="text-xs rounded bg-red-100 py-1 px-4" @click="show = !show"
                                :class="{'block': !show, 'hidden':show }">Hidden Password</button>
                        </div>
                        <div
                            class="flex justify-between items-center gap-2 mt-2 bg-gradient-to-r from-yellow-300 to-gray-400 text-white p-2 rounded-xl shadow-lg px-4">
                            <div class="text-center">
                                <input type="radio" class="rounded border-gray-300 text-indigo-600 shadow-sm"
                                    name="role" value="client" id="client">
                                <label class="block mt-2 text-xs uppercase font-bold" for="client">Client</label>
                            </div>
                            <div class="text-center">
                                <input type="radio" class="rounded border-gray-300 text-indigo-600 shadow-sm
focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="role" value="worker" id="worker">
                                <label class="block mt-2 text-xs uppercase font-bold" for="worker">Worker</label>
                            </div>
                        </div>
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-3">
                        <x-jet-label for="terms">
                            <div class="flex items-center">
                                <x-jet-checkbox name="terms" id="terms" />

                                <div class="ml-2 text-xs">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                        class="underline text-xs font-bold text-gray-600 hover:text-gray-900">'.__('Terms
                                        of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                        class="underline text-xs font-bold text-gray-600 hover:text-gray-900">'.__('Privacy
                                        Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-jet-label>
                    </div>
                    @endif

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-jet-button class="ml-4">
                            {{ __('Register') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-guest-layout>