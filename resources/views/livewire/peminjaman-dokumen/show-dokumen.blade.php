<div class="relative mt-4 overflow-x-auto shadow-lg sm:rounded-md">
    <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
        <thead class="bg-slate-300 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3" scope="col">
                    No
                </th>
                <th class="px-6 py-4" scope="col">
                    <button class="flex items-center uppercase" wire:click="sortResult('kode_notaris')">
                        Jenis
                        <svg class="ms-1.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                        </svg>
                    </button>
                </th>
                <th class="px-7 py-4" scope="col">
                    <button class="flex items-center uppercase" wire:click="sortResult('nama_notaris')">
                        Status
                        <svg class="ms-1.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                        </svg>
                    </button>
                </th>
                <th class="px-4 py-4 text-center" scope="col">
                    Detail
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach (['PPJB', 'AJB', 'SKMHT', 'APHT', 'PH', 'SHT', 'IMB', 'Sertipikat', 'PK', 'CN'] as $jenis)
                @php
                    $dok = $dokumen->where('jenis', $jenis)->first();
                    $shtSelected = false;
                @endphp

                @if ($dok && $dok->status_pinjaman == 0)
                    <tr
                        class="border-b-2 bg-white odd:bg-gray-100 even:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                            scope="row">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $dok->jenis }}
                        </td>
                        <td class="px-2 py-4">
                            @if ($dok->status_keluar == 0)
                                <span
                                    class="me-2 inline-block rounded-full bg-green-200 px-7 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">Tersedia</span>
                            @else
                                <span
                                    class="me-2 rounded-full bg-gray-600 px-8 py-0.5 text-xs font-medium text-white dark:bg-indigo-900 dark:text-indigo-300">Keluar</span>
                            @endif

                        </td>
                        <td class="flex flex-col items-center justify-between px-2 py-4">
                            @if ($dok->status_keluar == 0)
                                <div class="me-11 flex items-center">
                                    <input
                                        class="mb-2 h-4 w-4 rounded border-gray-300 bg-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        id="checkbox-{{ $dok->id }}" type="checkbox" value="{{ $jenis }}"
                                        wire:model.live="checkedDokumen">
                                    <label class="mb-2 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        for="checkbox-{{ $dok->id }}">Pilih Dokumen</label>
                                </div>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @elseif ($dok && $dok->status_pinjaman == 1)
                    <tr
                        class="border-b-2 bg-white odd:bg-gray-100 even:bg-gray-50 hover:bg-slate-100 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                            scope="row">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $dok->jenis }}
                        </td>
                        <td class="px-2 py-4">
                            <span
                                class="me-1 inline-block rounded-full bg-yellow-200 px-7 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">Dipinjam</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            -
                        </td>
                        </td>
                    </tr>
                @else
                    <tr
                        class="border-b-2 bg-white odd:bg-gray-100 even:bg-gray-50 hover:bg-slate-100 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                            scope="row">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $jenis }}
                        </td>
                        <td class="px-1 py-4">
                            <span
                                class="inline-block rounded-full bg-red-200 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:bg-red-900 dark:text-red-300">
                                Belum Tersedia
                            </span>
                        </td>
                        <td class="px-8 py-4 text-center">
                            -
                        </td>
                    </tr>
                @endif
            @endforeach
            {{-- <tr>
                <td></td>
                <td></td>
                <td></td>
                <td class="flex flex-col items-center justify-start px-2 py-4">
                    <div class="flex items-center">
                        <input
                            class="mb-2 h-4 w-4 rounded border-gray-300 bg-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                            id="checkbox" type="checkbox" value="" wire:model.live="checkAllDokumen"
                            wire:click="selectAllDokumen()">
                        <label class="mb-2 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                            for="checkbox">Pilih Semua Dokumen</label>
                    </div>
                </td>
            </tr> --}}
        </tbody>
    </table>
</div>
