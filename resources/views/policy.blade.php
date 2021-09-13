<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center px-6 pt-20 pb-40">
        <div class="w-full sm:max-w-md  px-6 py-4 bg-white overflow-hidden rounded-xl border">
            <div class="flex justify-center">
                <img src="{{ asset('img/logo.svg') }}" class="w-6 h-6">
            </div>
            <hr class="my-4 border-dashed">
            <div class="flex justify-between mb-4 text-xs">
                <a class="bg-gray-300 py-1 px-3 rounded" href="{{ route('terms.show') }}">Terms
                    of Service</a>
                <a class="bg-gray-300 py-1 px-3 rounded" href="{{ route('policy.show') }}">Privacy Policy</a>
            </div>
            <div class="text-xs">
                {!! $policy !!}
            </div>
        </div>
    </div>
</x-guest-layout>