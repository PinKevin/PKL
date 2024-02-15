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
            <div>
                <label class="lock mb-1 ml-1 text-sm font-medium text-gray-800">Filter</label>
                <select
                    class="w-full gap-48 rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="jenis_filter" name="jenis_filter" wire:model.live="jenis_filter">
                    <option value="" selected>Semua</option>
                    <option value="Peminjaman">Peminjaman</option>
                    <option value="Pengembalian">Pengembalian</option>
                    <option value="Pengambilan">Pengambilan</option>
                </select>
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
                        Jenis
                    </th>
                    <th class="px-7 py-4" scope="col">
                        Dokumen
                    </th>
                    <th class="px-7 py-4" scope="col">
                        Tanggal Pembuatan
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($allTransaksi as $transaksi)
                    <tr
                        class="border-b-2 bg-white odd:bg-gray-100 even:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                            scope="row">
                            {{ $transaksi['urutan'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $transaksi['no_debitur'] }}
                        </td>
                        <td class="px-4 py-4">
                            {{ $transaksi['nama_debitur'] }}
                        </td>
                        <td class="px-4 py-4">
                            @if ($transaksi['jenis'] == 'Peminjaman')
                                <span
                                    class="me-2 rounded-full bg-yellow-200 px-4 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">
                                    Peminjaman
                                </span>
                            @elseif ($transaksi['jenis'] == 'Pengembalian')
                                <span
                                    class="me-2 rounded-full bg-green-200 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">Pengembalian</span>
                            @else
                                <span
                                    class="me-2 rounded-full bg-blue-300 px-3.5 py-0.5 text-xs font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-300">Pengambilan</span>
                            @endif

                        </td>
                        <td class="px-8 py-4">
                            <ul class="max-w-md list-inside list-disc space-y-1 text-gray-500 dark:text-gray-400">
                                @foreach ($transaksi['dokumen'] as $dok)
                                    <li>{{ $dok }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="px-11 py-4">
                            {{ $transaksi['tanggal_buat']->format('d-m-Y') }}
                        </td>
                        {{-- <td class="flex justify-between px-6 py-4">
                            <button id="button-show-modal" data-modal-target="show-modal" data-modal-toggle="show-modal"
                                type="button" wire:click="showStaffCabang({{ $s->id }})">
                                <svg class="h-4 w-4 text-yellow-300 hover:text-gray-900 dark:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                            </button>
                            <button id="button-edit-modal" data-modal-target="edit-modal" data-modal-toggle="edit-modal"
                                type="button" wire:click="editStaffCabang({{ $s->id }})">
                                <svg class="h-4 w-4 text-blue-600 hover:text-blue-900 dark:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 18">
                                    <path
                                        d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                                    <path
                                        d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                                </svg>
                                <div class="sr-only">Edit</div>
                            </button>
                            <button id="button-delete-modal" data-modal-target="delete-modal"
                                data-modal-toggle="delete-modal" type="button"
                                wire:click="deleteStaffCabang({{ $s->id }})">
                                <svg class="h-4 w-4 text-red-600 hover:text-red-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                    <path
                                        d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                                </svg>
                            </button>
                        </td> --}}
                    </tr>
                @empty
                    <tr
                        class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 text-center" colspan="6">
                            Tidak ada data!
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{-- {{ $allTransaksi }}

    {{ $date_filter_awal }}
    {{ $date_filter_akhir }} --}}
</div>
