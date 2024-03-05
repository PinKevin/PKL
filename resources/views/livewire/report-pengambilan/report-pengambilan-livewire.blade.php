<div>
    <h2 class="text-4xl font-semibold text-gray-900 dark:text-gray-100">Report Pengambilan</h2>

    <div class="mt-5 flex max-w-full justify-between">
        <div class="flex justify-stretch">
            <div class="bg-slate-100 dark:bg-gray-900">
                <label class="mb-1 ml-1 block text-sm font-medium text-gray-800">Cari Nama/Nomor Debitur</label>
                <label class="sr-only" for="table-search">Search</label>
                <div class="relative mt-1">
                    <div class="rtl:inset-r-0 pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input
                        class="block w-60 rounded-lg border-2 border-gray-300 bg-gray-50 ps-10 pt-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 lg:w-[500px]"
                        id="table-search" type="search" wire:model.live="nama_filter" placeholder="Search for items">
                </div>
            </div>
        </div>
        <div class="ml-2 md:ml-0">
            <button
                class="mt-7 rounded-lg bg-blue-700 px-6 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button" wire:click="printReport()">Print Report</button>
        </div>
    </div>

    <div class="relative mt-5 overflow-x-auto shadow-lg sm:rounded-md">
        <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
            <thead class="bg-slate-300 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3" scope="col">
                        No
                    </th>
                    <th class="px-6 py-4" scope="col">
                        Nomor Debitur
                    </th>
                    <th class="px-5 py-4" scope="col">
                        Nama
                    </th>
                    <th class="px-7 py-4" scope="col">
                        Dokumen
                    </th>
                    <th class="px-7 py-4" scope="col">
                        Tanggal Diambil
                    </th>
                </tr>
            </thead>
            <tbody
                class="border-b odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800">
                @php
                    $sortedDebitur = $allDebitur->values();
                    $offset = $paginator->perPage() * ($paginator->currentPage() - 1) + 1;
                @endphp
                @if ($sortedDebitur->isEmpty())
                    <tr>
                        <td class="bg-slate-100 p-4 text-center text-gray-600" colspan="5">Data tidak tersedia</td>
                    </tr>
                @else
                    @foreach ($sortedDebitur as $index => $debitur)
                        @php
                            $sortedDokumen = $debitur->dokumen->values();
                        @endphp
                        @foreach ($sortedDokumen as $dokumenIndex => $dokumen)
                            <tr
                                class="border-b-2 border-gray-300 odd:bg-gray-100 even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800">
                                @if ($dokumenIndex === 0)
                                    <th class="px-6 py-3 font-medium text-gray-900"
                                        rowspan="{{ count($debitur->dokumen) }}">{{ $index + $offset }}
                                    </th>
                                    <td class="px-6 py-4 text-gray-600" rowspan="{{ count($debitur->dokumen) }}">
                                        {{ $debitur->no_debitur }}</td>
                                    <td class="px-4 py-3 text-gray-600" rowspan="{{ count($debitur->dokumen) }}">
                                        {{ $debitur->nama_debitur }}</td>
                                @endif
                                <td class="px-8 py-1 text-gray-600">{{ $dokumen->jenis }}</td>
                                <td class="px-12 py-3 text-gray-600">{{ $dokumen->tanggal_diambil }}
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div class="mt-4 items-center">
        {{ $paginator->links() }}
    </div>
</div>
