<x-client-layout>
    <div class="px-3 bg-white shadow-lg rounded-lg py-4">
        <p class="text-center my-2 text-gray-600">{{ $req->invoice }}</p>
        <hr class="my-2 border-dashed">
        <div class="text-xs">
            Hey, ini adalah invoice kamu guys.
        </div>
        <div class="mt-4 grid grid-cols-2 text-xs">
            <div class="my-2 capitalize">Client</div>
            <div class="my-2 capitalize">: {{ $req->client->user->name }}</div>
            <div class="my-2 capitalize">Worker</div>
            <div class="my-2 capitalize">: {{ $req->worker->user->name }}</div>
            <div class="my-2 capitalize">Skill</div>
            <div class="my-2 capitalize">: {{ $req->skill->name }}</div>
            <div class="my-2 capitalize">Date</div>
            <div class="my-2 capitalize">: {{ $req->date }}</div>
            <div class="my-2 capitalize">Phone</div>
            <div class="my-2 capitalize">: {{ $req->phone }}</div>
            <div class="my-2 capitalize">Notes</div>
            <div class="my-2 capitalize">: {{ $req->notes }}</div>
            <div class="my-2 capitalize">Point</div>
            <div class="my-2 capitalize">: {{ $req->point ?? 'nothing' }}</div>
            <div class="my-2 capitalize">Harga Nego</div>
            <div class="my-2 capitalize">: Rp. {{ number_format($req->skill->price) }}</div>
            <div class="my-2 capitalize">Harga Tawar</div>
            <div class="my-2 capitalize">: Rp. {{ number_format($req->offer) }}</div>
        </div>
        <hr class="border-dashed my-3">
        <div class="text-xs">
            Status request :
            @if ($req->status == true)
            @if ($req->point == null)
            <span>Worker sedang bekerja</span>
            @else
            <span>Tugas worker selesai dan anda memberikan nilai {{ $req->point }}</span>
            @endif
            @else
            <span>Sedang dalam proses penawaran</span>
            @endif
        </div>
    </div>
</x-client-layout>