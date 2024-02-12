<div class="relative mt-3 overflow-x-auto shadow-lg sm:rounded-md">
    <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
        <thead class="bg-slate-300 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-11 py-4" scope="col">
                    No
                </th>
                <th class="px-12 py-4" scope="col">
                    Jenis
                </th>
                <th class="px-5 py-4 " scope="col">
                    Tersedia
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach (['PPJB', 'AJB', 'SKMHT', 'APHT', 'PH', 'SHT', 'IMB', 'Sertipikat', 'PK', 'CN'] as $jenis)
                @php
                    $dok = $allDokumen->where('jenis', $jenis)->first();
                    $shtSelected = false;
                @endphp

                @if ($dok && $dok->status_pinjaman == 0)
                    <tr
                        class="border-b-2 bg-white odd:bg-gray-100 even:bg-gray-50 hover:bg-slate-100 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap px-12 py-4 font-medium text-gray-900 dark:text-white"
                            scope="row">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-12 py-4">
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

                    </tr>
                @elseif ($dok && $dok->status_pinjaman == 1)
                    <tr
                        class="border-b-2 bg-white odd:bg-gray-100 even:bg-gray-50 hover:bg-slate-100 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap px-12 py-4 font-medium text-gray-900 dark:text-white"
                            scope="row">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-12 py-4">
                            {{ $dok->jenis }}
                        </td>
                        <td class="px-2 py-4">
                            <span
                                class="me-1 inline-block rounded-full bg-yellow-200 px-7 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">Dipinjam</span>
                        </td>

                    </tr>
                @else
                    <tr
                        class="border-b-2 bg-white odd:bg-gray-100 even:bg-gray-50 hover:bg-slate-100 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap px-12 py-4 font-medium text-gray-900 dark:text-white"
                            scope="row">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-12 py-4">
                            {{ $jenis }}
                        </td>
                        <td class="px-1 py-4">
                            <span
                                class="inline-block rounded-full bg-red-200 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:bg-red-900 dark:text-red-300">
                                Belum Tersedia
                            </span>
                        </td>

                    </tr>
                @endif
            @endforeach

        </tbody>
    </table>
</div>
