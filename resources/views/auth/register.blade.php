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
                    <!-- modal div -->
                    <div class="mt-6" x-data="{ open: false }">
                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-jet-button type="button" @click="open = true" class="ml-4">
                                {{ __('Next To Register') }}
                            </x-jet-button>
                        </div>

                        <!-- Dialog (full screen) -->
                        <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full" x-show="open">

                            <!-- A basic modal dialog with title, body and one button to close -->
                            <div class="h-auto p-4 text-left bg-white rounded shadow-xl md:max-w-xl"
                                @click.away="open = false">
                                <div class="flex justify-between items-center text-xs">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                                        Location Anda
                                    </h3>
                                    <button @click="open = false" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="mt-3 text-left">

                                    <div class="mt-2 w-full">
                                        <label class="block text-sm w-full">
                                            <span class="text-gray-700 dark:text-gray-400">Provinsi</span>
                                            <select onchange="province()" id="provinceid" name="province_id" class="block w-full dark:bg-gray-700 border-gray-300
focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                                                <option selected>Pilih</option>
                                                @foreach(\App\Models\Province::get() as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>

                                                @endforeach

                                            </select>
                                        </label>
                                        <div id="regencyShow"></div>
                                        <div id="districtShow"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <x-location-ajax></x-location-ajax>
</x-guest-layout>