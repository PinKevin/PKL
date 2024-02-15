<div>
    <h2 class="text-4xl font-semibold text-gray-900 dark:text-gray-100">Report</h2>

    <div class="mt-5 flex max-w-full justify-between">
        <div class="flex justify-stretch">
            <div class="mr-2">
                <label class="mb-1 ml-1 block text-sm font-medium text-gray-800">Tanggal Awal</label>
                <input
                    class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="date_filter_awal" name="date_filter_awal" type="date" wire:model.live="date_filter_awal" />
            </div>

            <div class="mr-2">
                <label class="mb-1 ml-1 block text-sm font-medium text-gray-800">Tanggal Akhir</label>
                <input
                    class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="date_filter_akhir" name="date_filter_akhir" type="date"
                    wire:model.live="date_filter_akhir" />
            </div>
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
                        id="table-search" type="search" wire:model.live="search" placeholder="Search for items">
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
                        Tanggal Peminjaman
                    </th>
                    <th class="px-7 py-4" scope="col">
                        Tanggal Jatuh Tempo
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $sortedDebitur = $allDebitur->values();
                @endphp
                @foreach ($sortedDebitur as $index => $debitur)
                    @php
                        $sortedDokumen = $debitur->dokumen->values();
                    @endphp
                    @foreach ($sortedDokumen as $dokumenIndex => $dokumen)
                        <tr>
                            @if ($dokumenIndex === 0)
                                <td rowspan="{{ count($debitur->dokumen) }}">{{ $index + 1 }}</td>
                                <td rowspan="{{ count($debitur->dokumen) }}">{{ $debitur->no_debitur }}</td>
                                <td rowspan="{{ count($debitur->dokumen) }}">{{ $debitur->nama_debitur }}</td>
                            @endif
                            <td>{{ $dokumen->jenis }}</td>
                            <td>{{ $dokumen->tanggal_pinjam }}
                            </td>
                            <td>{{ $dokumen->tanggal_jatuh_tempo }}
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>
