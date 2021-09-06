<x-guest-layout>
    <x-nav-header-welcome></x-nav-header-welcome>
    <section class="text-gray-600 body-font bg-gray-100 min-h-screen bg-cover"
        style="background-image: url('/img/background.png')">
        <div class="container xl:px-32 px-5 py-32 mx-auto flex flex-wrap items-center">
            <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
                @auth
                <p class="text-xl text-white font-bold">Yey. Sekarang kamu bisa mencari pekerja di sekitarmu.</p>
                @else
                <p class="text-xl text-white font-bold">Sorry. Kamu belum bisa mencari pekerja di sekitarmu. <br>
                    Silahkan
                    LOGIN dulu </p>
                @endauth
                <p class="leading-relaxed mt-4 text-sm lg:max-w-xl font-medium  text-black text-center md:text-left ">
                    Dunia semakin komplek, waktu semakin berharga, menyelesaikan masalah yang kecil seringkali
                    menimbulkan masalah yang besar bagi sebagian orang. Jasaku hadir untuk membantu kamu dengan memberi
                    pekerjaan kepada pekerja lepas
                </p>
                <p class="text-sm text-yellow-200 mt-3 text-center md:text-left "><b>Dev By Kel. 5 </b> &copy; Dignitas
                    Academy</p>

            </div>
            <div
                class="lg:w-2/6 md:w-1/2 bg-white bg-opacity-60 shadow-lg rounded-lg px-8 pb-6 flex flex-col md:ml-auto w-full mt-10 md:mt-0 py-14">
                <img src="{{ asset('img/logo.svg') }}" class="mt-4 w-10 mx-auto" alt="Logo">
                <p class="mt-1 text-center font-bold">J A S A K U</p>
                <div class="mt-3">
                    <form action="{{ route('search') }}" method="GET">
                        @csrf
                        <select name="skill_id"
                            class="w-full dark:bg-gray-700 border-gray-300
                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            @foreach (App\Models\Skill::get() as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <button class="bg-gray-800 py-2 px-4 rounded-lg text-white mt-2 w-full"
                            type="submit">Select</button>
                    </form>
                </div>
                <p class="mt-3 text-xs text-center">Platform pekerja Lorem ipsum, dolor sit amet consectetur adipisicing
                    elit. Deserunt, nam!</p>
                <div
                    class="text-center mt-2 font-bold p-2 bg-gradient-to-r from-red-300 to-yellow-200 rounded-lg text-xs">
                    Anda harus login terlebih dahulu untuk mencari pekerja
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>