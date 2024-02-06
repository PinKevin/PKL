<!-- Main modal -->
<div class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0"
    id="show-bast-log-modal" aria-hidden="true" tabindex="-1" wire:ignore.self>
    <div class="relative max-h-full w-full max-w-4xl p-4">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-blue-600 shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between rounded-t border-b p-4 dark:border-gray-600 md:p-3">
                <h3 class="text-lg font-semibold text-white dark:text-white">
                    Riwayat
                </h3>
                <button
                    class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-white hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="show-bast-log-modal" type="button">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="relative space-y-4 overflow-x-auto bg-slate-100 p-4 shadow-md md:p-5"
                style="max-height: 400px; overflow-y: auto;">
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
                                Tanggal Kembali
                            </th>
                            <th class="px-4 py-4" scope="col">
                                Dokumen yang Dikembalikan
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
                                        {{ $log->tanggal_kembali->format('d-m-Y') }}
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
                                                    href="{{ route('pengembalian.cetak', ['id' => $log->id]) }}">
                                                    Cetak BAST
                                                </a>
                                            </button>
                                        </div>
                                        {{-- @if (in_array('SHT', $jenisList[$log->id]) && $suratRoya)
                                            <div class="mt-2">
                                                <button
                                                    class="flex rounded-lg bg-green-700 px-5 py-2 text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                    <a class="flex items-center"
                                                        href="{{ route('surat-roya.cetak', ['id' => $suratRoya->id]) }}">
                                                        Cetak Roya
                                                    </a>
                                                </button>
                                            </div>
                                        @endif --}}
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <tr
                                class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 text-center" colspan="5">
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