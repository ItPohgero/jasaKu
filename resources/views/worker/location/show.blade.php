<x-worker-layout>
    <section class="text-gray-600 body-font">
        <div class="container flex flex-wrap px-5 py-6 mx-auto items-center bg-white rounded-2xl shadow-lg">
            <div class="md:w-1/2 relative">
                <div
                    class="bg-white-500 w-full h-full absolute sm:rounded-bl-lg md:rounded-bl-none md:rounded-tr-lg rounded-br-lg">
                </div>
                <img class="h-full w-full object-cover sm:rounded-bl-lg md:rounded-bl-none md:rounded-tr-lg rounded-br-lg opacity-10"
                    src="{{ asset('img/peta.png') }}" alt="Banner" />
                <div class="absolute top-10 w-full items-center">
                    <div class="flex justify-center font-bold">INFORMASI</div>
                    <p class="p-3 text-sm text-justify">
                        Client akan menemukan anda dalam ruang kecamatan, kabupaten dan kota serta provinsi yang sama.
                    </p>
                </div>
            </div>
            <div class="flex flex-col md:w-1/2 md:pl-12">
                <h2 class="title-font font-semibold text-gray-800 tracking-wider text-sm mb-3">LOCATION</h2>
                <div class="w-full">
                    <h2 class="text-sm capitalize"><span class="font-bold text-yellow-800">Provinsi</span> :
                        {{ $province->name }} </h2>
                    <h2 class="text-sm capitalize"><span class="font-bold text-yellow-800">Kabupaten/Kota</span> :
                        {{ $regency->name }} </h2>
                    <h2 class="text-sm capitalize"><span class="font-bold text-yellow-800">Kecamatan</span> :
                        {{ $district->name }} </h2>
                </div>
            </div>
        </div>
    </section>

</x-worker-layout>