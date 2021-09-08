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
                    <div class="grid grid-cols-2 gap-2">

                        <div class="mt-3">
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" autofocus autocomplete="name" />
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
                    </div>
                    <div x-data="{ show: true }">
                        <div class="grid grid-cols-2 gap-2">
                            <div class="mt-3">
                                <x-jet-label for="password" value="{{ __('Password') }}" />
                                <input id="password" :type="show ? 'password' : 'text'"
                                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                    name="password" autocomplete="new-password">
                                @error('password')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex items-baseline">
                                <div class="mt-8 w-4/5">
                                    <input id="password_confirmation" :type="show ? 'password' : 'text'"
                                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                        name="password_confirmation" autocomplete="new-password">
                                </div>
                                <div class="mt-3 w-1/5 pt-4 flex justify-center items-center">
                                    <button type="button" class="p-1" @click="show = !show"
                                        :class="{'hidden': !show, 'block':show }">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                            <path fill-rule="evenodd"
                                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <button type="button" class="p-1" @click="show = !show"
                                        :class="{'block': !show, 'hidden':show }">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z"
                                                clip-rule="evenodd" />
                                            <path
                                                d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex justify-between items-center gap-2 mt-2 bg-gradient-to-r from-purple-100 via-red-100 to-gray-100 text-gray-600 p-2 rounded-lg shadow-lg px-4">
                        <div class="text-center">
                            <input type="radio" class="rounded border-gray-300 text-indigo-600 shadow-sm" name="role"
                                value="client" id="client">
                            <label class="block mt-2 text-xs uppercase font-bold" for="client">Client</label>
                        </div>
                        <div class="text-xs text-gray-7000">or</div>
                        <div class="text-center">
                            <input type="radio" class="rounded border-gray-300 text-indigo-600 shadow-sm
focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="role" value="worker" id="worker">
                            <label class="block mt-2 text-xs uppercase font-bold" for="worker">Worker</label>
                        </div>
                    </div>
                    <hr class="border-dashed border-gray-400 mt-4">
                    <div class="mt-2 w-full">
                        <div class="flex justify-center gap-2">
                            <label class="lock text-sm mt-4">
                                <span class="text-gray-700 dark:text-gray-400">Provinsi</span>
                                <select onchange="province()" id="provinceid" name="province_id"
                                    class="block w-full dark:bg-gray-700 border-gray-300
                                                focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                                    <option selected>Pilih</option>
                                    @foreach(\App\Models\Province::get() as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>

                                    @endforeach

                                </select>
                            </label>
                            <div id="regencyShow"></div>
                        </div>
                        <div id="districtShow"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <x-location-ajax></x-location-ajax>
</x-guest-layout>