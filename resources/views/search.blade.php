<x-guest-layout>
    <p>Informasi Pengguna</p>
    <p>lokasi Prov : {{ location_client('province')->name }}</p>
    <p>lokasi Kota : {{ location_client('regency')->name }}</p>
    <p>lokasi Kecamatan : {{ location_client('district')->name }}</p>

    <hr>

    @foreach ($skill_user as $item)
    @php
    $user = \App\Models\User::whereId($item->user_id)->firstOrFail();
    $worker = \App\Models\Worker::whereUser_id($user->id)->firstOrFail();
    @endphp
    @if (location_client('province')->name == $worker->province->name && location_client('regency')->name ==
    $worker->regency->name && location_client('district')->name == $worker->district->name)
    <div>
        <p>NAMA : {{ $user->name }}</p>
        <p>SKILL : {{$skill->name}}</p>
        <p>Province : {{ $worker->province->name }}</p>
        <p>Kabupaten / Kota : {{ $worker->regency->name }}</p>
        <p>Kabupaten / Kota : {{ $worker->district->name }}</p>
    </div>
    @endif
    @endforeach
</x-guest-layout>