<div class="mt-4 bg-slate-100 shadow-lg sm:rounded-lg" id="accordion-color" data-accordion="collapse"
    data-active-classes="bg-slate-200 mt-4 dark:bg-gray-800 text-blue-600 dark:text-white">
    <h2 id="accordion-color-heading-1">
        <button
            class="flex w-full items-center justify-between gap-3 rounded-t-xl border border-b-0 border-slate-200 p-5 font-medium text-gray-800 hover:bg-slate-200 focus:ring-4 focus:ring-slate-300 rtl:text-right dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 dark:focus:ring-blue-100"
            data-accordion-target="#accordion-color-body-1" type="button" aria-expanded="false"
            aria-controls="accordion-color-body-1">
            <span>Riwayat Peminjaman</span>
            <svg class="h-3 w-3 shrink-0 rotate-180" data-accordion-icon aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5 5 1 1 5" />
            </svg>
        </button>
    </h2>
    <div class="hidden" id="accordion-color-body-1" aria-labelledby="accordion-color-heading-1">
        <div class="border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
            <div
                class="relative space-y-4 overflow-x-auto max-h-[400px] overflow-y-auto bg-slate-100 p-4 shadow-md md:p-5">
                <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400 sm:rounded-lg">
                    <thead class="bg-gray-300 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3" scope="col">
                                No
                            </th>
                            <th class="px-4 py-4" scope="col">
                                Tanggal Buat
                            </th>
                            <th class="px-4 py-4" scope="col">
                                Tanggal Pinjam
                            </th>
                            <th class="px-4 py-4" scope="col">
                                Tanggal Jatuh Tempo
                            </th>
                            <th class="px-4 py-4" scope="col">
                                Dokumen yang Dipinjam
                            </th>
                            <th class="px-4 py-4" scope="col">
                                Download BAST
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($logBast)
                            @foreach ($logBast as $log)
                                <tr
                                    class="border-b-2 bg-white odd:bg-gray-100 even:bg-gray-50 hover:bg-slate-100 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                                    <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                        scope="row">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $log->created_at->format('d-m-Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $log->tanggal_pinjam->format('d-m-Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $log->tanggal_jatuh_tempo->format('d-m-Y') }}
                                    </td>
                                    <td class="px-14 py-4">
                                        <ul
                                            class="max-w-md list-inside list-disc space-y-1 text-gray-500 dark:text-gray-400">
                                            @foreach ($jenisList[$log->id] as $jenis)
                                                <li>{{ $jenis }}</li>
                                            @endforeach
                                        </ul>
                                    </td>

                                    <td class="px-4 py-4">
                                        <div class="text-center">
                                            <button
                                                class="flex rounded-lg bg-blue-700 px-5 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <a class="flex items-center"
                                                    href="{{ route('peminjaman.cetak', ['id' => $log->id]) }}">
                                                    Cetak BAST
                                                </a>
                                            </button>
                                        </div>
                                        @php
                                            $suratRoya = $log->suratRoya;
                                        @endphp
                                        @if (in_array('SHT', $jenisList[$log->id]) && $suratRoya)
                                            <div class="mt-2">
                                                <button
                                                    class="flex rounded-lg bg-green-700 px-5 py-2 text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                    <a class="flex items-center"
                                                        href="{{ route('surat-roya.cetak', ['id' => $suratRoya->id]) }}">
                                                        Cetak Roya
                                                    </a>
                                                </button>
                                            </div>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <tr
                                class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 text-center" colspan="6">
                                    Tidak ada data!
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
