<x-worker-layout>
    <section class="text-gray-600 body-font">
        <div
            class="container flex flex-wrap px-2 py-6 mx-auto items-center bg-white dark:bg-gray-800 dark:text-gray-300 rounded-2xl shadow-lg">
            <div class="md:w-1/2 relative">
                <div
                    class="bg-white-500 dark: w-full h-full absolute sm:rounded-bl-lg md:rounded-bl-none md:rounded-tr-lg rounded-br-lg">
                </div>
                <img class="h-full w-full object-cover sm:rounded-bl-lg md:rounded-bl-none md:rounded-tr-lg rounded-br-lg opacity-10"
                    src="{{ asset('img/peta.png') }}" alt="Banner" />
                <div class="absolute top-5 w-full items-center">
                    <div class="flex justify-center font-bold">INFORMASI</div>
                    <p class="p-3 text-sm text-justify">
                        Client akan menemukan anda dalam ruang kecamatan, kabupaten dan kota serta provinsi yang sama.
                    </p>
                    <!-- component -->
                    <div x-data="{ showModal : false }">
                        <!-- Button -->
                        <button @click="showModal = !showModal"
                            class="px-4 py-2 text-sm ml-3 bg-white rounded-lg border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-gray-50 focus:bg-indigo-50 focus:text-indigo">Update</button>

                        <!-- Modal Background -->
                        <div x-show="showModal"
                            class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 left-0 right-0 top-0 bottom-0"
                            x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                            <!-- Modal -->
                            <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 mx-10"
                                @click.away="showModal = false"
                                x-transition:enter="transition ease duration-100 transform"
                                x-transition:enter-start="opacity-0 scale-90 translate-y-1"
                                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                                x-transition:leave="transition ease duration-100 transform"
                                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                                x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                                <!-- Title -->
                                <form action="{{ route('worker.location.update') }}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <div class="grid grid-cols-1 gap-3">
                                        <label class="block text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">Provinsi</span>
                                            <select onchange="province()" id="provinceid" name="province_id"
                                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">

                                                <option selected>Pilih</option>
                                                @foreach($province as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>

                                                @endforeach

                                            </select>
                                        </label>
                                        <div id="regencyShow1"></div>
                                    </div>
                                    <div id="districtShow1"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-3 flex flex-col md:w-1/2 md:pl-12">
                <h2 class="title-font font-semibold text-gray-800 tracking-wider text-sm mb-3">LOCATION</h2>
                <div class="w-full">
                    <h2 class="text-sm capitalize"><span class="font-bold text-yellow-800">Provinsi</span> :
                        {{ $p->name }} </h2>
                    <h2 class="text-sm capitalize"><span class="font-bold text-yellow-800">Kabupaten/Kota</span> :
                        {{ $r->name }} </h2>
                    <h2 class="text-sm capitalize"><span class="font-bold text-yellow-800">Kecamatan</span> :
                        {{ $d->name }} </h2>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script>
        function province(){
            
                    let province = $('#provinceid').val();
            
                    $('#regencyShow1').load('{{url("regency1")}}/'+province, function(e) {});        
                }
    
        function regency(){
        
                let regency = $('#regencyid').val();
        
                $('#districtShow1').load('{{url("district1")}}/'+regency, function(e) {});        
            }
            
    </script>

</x-worker-layout>