<div>
    <h2 class="text-4xl font-semibold text-gray-900 dark:text-gray-100">Dokumen Tersedia</h2>

    {{-- {!! $allDokumen !!} --}}
    <div class="mt-4 relative overflow-x-auto shadow-lg sm:rounded-md">
        <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
            <thead class="bg-slate-300 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-4" scope="col">
                        No
                    </th>
                    <th class="px-7 py-4" scope="col">
                        <button class="flex items-center uppercase" wire:click="sortResult('no_debitur')">
                            Nomor Debitur
                            <svg class="ms-1.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg>
                        </button>
                    </th>
                    <th class="px-7 py-4" scope="col">
                        <button class="flex items-center uppercase" wire:click="sortResult('nama_debitur')">
                            Nama Debitur
                            <svg class="ms-1.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg>
                        </button>
                    </th>
                    <th class="px-4 py-4" scope="col">
                        Dokumen
                    </th>
                    <th class="px-12 py-4" scope="col">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allDokumen as $dok)
                    <tr
                        class="border-b-2 bg-white odd:bg-slate-100 even:bg-gray-50  dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                        <th class="px-6 py-4 whitespace-nowrap font-medium text-gray-900 dark:text-white" scope="row"
                            rowspan="11">{{ $loop->iteration }}</th>
                        <td class="px-6 py-4 border-b-2 text-gray-600" rowspan="11">
                            {{ $dok->first()->debitur->no_debitur }}</td>
                        <td class="px-6 py-4 border-b-2 text-gray-600" rowspan="11">
                            {{ $dok->first()->debitur->nama_debitur }}</td>
                    </tr>
                    @foreach (['PPJB', 'AJB', 'SKMHT', 'APHT', 'PH', 'SHT', 'IMB', 'Sertipikat', 'PK', 'CN'] as $jenis)
                        @php
                            $d = $dok->where('jenis', $jenis)->first();
                        @endphp
                        @if ($d)
                            <tr
                                class="text-gray-600 border-b-2 bg-white odd:bg-slate-100 even:bg-gray-50  dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                                <td class="px-6 py-1">
                                    {{ $jenis }}
                                </td>
                                <td class="px-6 py-1">
                                    @if ($d->status_pinjaman == 0)
                                        <span
                                            class="bg-green-200 text-green-800 text-xs font-medium me-2 px-[27px] py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">Tersedia</span>
                                    @elseif ($d->status_keluar == 1)
                                        <span
                                            class="bg-gray-700 text-indigo-800 text-xs font-medium me-2 px-6 py-0.5 rounded-full dark:bg-indigo-900 dark:text-indigo-300">Keluar</span>
                                    @elseif ($d->status_pinjaman == 1)
                                        <span
                                            class="bg-yellow-200 text-yellow-800 text-xs font-medium me-2 px-6 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">Dipinjam</span>
                                    @endif
                                </td>
                            </tr>
                        @else
                            <tr
                                class="border-b-2 bg-white odd:bg-slate-100 even:bg-gray-50  dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                                <td class="px-6 py-1">{{ $jenis }}</td>
                                <td class="px-6 py-1">
                                    <span
                                        class="bg-red-200 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">
                                        TIdak Tersedia
                                    </span>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- <div class="mt-4 items-center">
        {{ $allDokumen->links() }}
    </div> --}}
</div>
