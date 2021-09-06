@if (role() == 'admin')
<x-admin-layout>
    {{$slot}}
</x-admin-layout>
@elseif(role() == 'worker')
<x-worker-layout>
    {{$slot}}
</x-worker-layout>
@else
<x-client-layout>
    {{$slot}}
</x-client-layout>
@endif