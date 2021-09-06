<x-admin-layout>
    <div class="container py-2 grid mx-auto">
        <div class='md:flex shadow-lg'>
            <div
                class="md:w-1/2 text-gray-800 bg-gray-100 p-8 sm:rounded-tr-lg md:rounded-tr-none md:rounded-bl-lg rounded-tl-lg">
                <div class="w-full">
                    <h1 class="text-xl mb-5 font-bold">NIK <span class="text-yellow-800">{{ $worker->nik }}</span></h1>
                    <h2 class="text-sm capitalize"><span class="font-bold text-yellow-800">Name</span> :
                        {{ $worker->name }} </h2>
                    <h2 class="text-sm capitalize"><span class="font-bold text-yellow-800">Email</span> :
                        {{ $user->email }} </h2>
                    <h2 class="text-sm capitalize"><span class="font-bold text-yellow-800">Born</span> :
                        {{ $worker->born }} </h2>
                    <h2 class="text-sm capitalize"><span class="font-bold text-yellow-800">Description</span> :
                        {{ $worker->desc }}
                    </h2>
                    <p class="mt-2 font-bold">Skills</p>
                    @foreach ($user->skills as $item)
                    <div class="mt-2 text-sm capitalize my-1 border-b border-dashed pb-2">
                        <p>* {{ $item->name }}</p>
                    </div>
                    @endforeach
                    <div class="flex justify-between mt-6">
                        <div>
                            <p class="text-2xl font-bold">10k+</p>
                            <p class="text-sm">Customer</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold">165</p>
                            <p class="text-sm">Point Feedback</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:w-1/2 relative">
                <div
                    class="bg-yellow-500 w-full h-full opacity-20 absolute sm:rounded-bl-lg md:rounded-bl-none md:rounded-tr-lg rounded-br-lg">
                </div>
                <img class="h-full w-full object-cover sm:rounded-bl-lg md:rounded-bl-none md:rounded-tr-lg rounded-br-lg"
                    src="{{ asset('img/background.jpg') }}" alt="Banner" />
            </div>
        </div>
    </div>
</x-admin-layout>