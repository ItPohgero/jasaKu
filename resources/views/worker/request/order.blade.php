<x-worker-layout>
    <x-div-table>
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Invoice</th>
                    <th class="px-4 py-3">Worker / Skill Request</th>
                    <th class="px-4 py-3">Date / Request</th>
                    <th class="px-4 py-3">Phone</th>
                    <th class="px-4 py-3">Notes</th>
                    <th class="px-4 py-3">Tawar</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @forelse ($attr as $item)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        <span class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div class="relative hidden w-8 h-8 mr-3 p-1 rounded-full md:block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full rounded-full" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    {{ $item->invoice }}
                                </p>
                            </div>
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm capitalize">
                        {{ $item->worker->user->name }}
                        <div>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                {{ $item->skill->name }}
                            </p>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $item->date }}
                        <div>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                {{ $item->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $item->phone }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $item->notes }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ number_format($item->skill->price) }} : {{ number_format($item->offer) }}
                    </td>
                    <td class="px-4 py-3 text-sm flex justify-center gap-2">
                        <div>
                            <form action="{{ route('worker.deal.order', $item->invoice) }}" method="post">
                                @csrf
                                @method('patch')
                                <button type="submit"
                                    class="bg-gray-800 py-2 px-5 text-white rounded-lg hover:bg-gray-900">Terima</button>
                            </form>
                        </div>
                        <div>
                            <form action="{{ route('worker.cancel.order', $item->invoice) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="bg-red-800 py-2 px-5 text-white rounded-lg hover:bg-red-900"
                                    onclick="return confirm('Yankin, kamu akan tolak invoice {{ $item->invoice }}')">Tolak</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <td class="px-4 py-3 text-sm" colspan="6">
                    <p class="text-red-500 text-xs">Data tidak ditemukan</p>
                </td>
                @endforelse
            </tbody>
        </table>
    </x-div-table>
</x-worker-layout>