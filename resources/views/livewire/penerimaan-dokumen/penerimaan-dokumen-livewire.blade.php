<div>
    @if (session('storeSuccess'))
        <div class="mb-4 flex items-center rounded-lg border-t-4 border-green-300 bg-green-100 p-4 text-green-800 dark:border-green-800 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg class="h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('storeSuccess') }}
            </div>
        </div>
    @endif
    @if (session('updateSuccess'))
        <div class="mb-4 flex items-center rounded-lg border-t-4 border-green-300 bg-green-100 p-4 text-green-800 dark:border-green-800 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg class="h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('updateSuccess') }}
            </div>
        </div>
    @endif
    @if (session('deleteSuccess'))
        <div class="mb-4 flex items-center rounded-lg border-t-4 border-green-300 bg-green-100 p-4 text-green-800 dark:border-green-800 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg class="h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('deleteSuccess') }}
            </div>
        </div>
    @endif
    @if (session('deleteError'))
        <div class="mb-4 flex items-center rounded-lg bg-red-50 p-4 text-red-800 dark:bg-gray-800 dark:text-red-400"
            id="alert-danger" role="alert">
            <svg class="h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('deleteError') }}
            </div>
        </div>
    @endif

    @include('livewire.penerimaan-dokumen.create-modal')
    @include('livewire.penerimaan-dokumen.show-modal')
    @include('livewire.penerimaan-dokumen.edit-modal')
    @include('livewire.penerimaan-dokumen.delete-modal')

    {{-- <p>Nama Debitur : {{ $debitur->nama_debitur }}</p>
    <p>Nomor Debitur : {{ $debitur->no_debitur }}</p> --}}

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
            <caption
                class="bg-slate-200 p-5 text-left text-lg font-semibold text-gray-900 rtl:text-right dark:bg-gray-800 dark:text-white">
                Hasil Pencarian "{{ $debitur->nama_debitur }}, {{ $debitur->no_debitur }}"
            </caption>
            <thead class="bg-slate-300 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3" scope="col">
                        Nama Debitur
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Nomor Debitur
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b-2 bg-white odd:bg-gray-100 even:bg-gray-50 dark:border-gray-700 dark:bg-gray-800">
                    <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white" scope="row">
                        {{ $debitur->nama_debitur }}
                    </th>
                    <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                        {{ $debitur->no_debitur }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="relative mt-3 overflow-x-auto shadow-lg sm:rounded-md">
        <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
            <thead class="bg-slate-300 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3" scope="col">
                        No
                    </th>
                    <th class="px-7 py-4" scope="col">
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
                            Tersedia
                            <svg class="ms-1.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg>
                        </button>
                    </th>
                    <th class="px-4 py-4" scope="col">
                        <button class="flex items-center uppercase" wire:click="sortResult('nama_notaris')">
                            Nomor Dokumen
                            <svg class="ms-1.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg>
                        </button>
                    </th>
                    <th class="px-4 py-4" scope="col">
                        <button class="flex items-center uppercase" wire:click="sortResult('nama_notaris')">
                            Tanggal Terima
                            <svg class="ms-1.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg>
                        </button>
                    </th>
                    <th class="px-4 py-4" scope="col">
                        <button class="flex items-center uppercase" wire:click="sortResult('nama_notaris')">
                            Tanggal Terbit
                            <svg class="ms-1.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg>
                        </button>
                    </th>
                    <th class="px-4 py-4" scope="col">
                        <button class="flex items-center uppercase" wire:click="sortResult('nama_notaris')">
                            Tanggal Jatuh Tempo
                            <svg class="ms-1.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg>
                        </button>
                    </th>
                    <th class="px-6 py-4" scope="col">
                        Detail
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach (['PPJB', 'AJB', 'SKMHT', 'APHT', 'PH', 'SHT', 'IMB', 'Sertipikat', 'PK', 'CN'] as $jenis)
                    @php
                        $dok = $dokumen->where('jenis', $jenis)->first();
                    @endphp

                    @if ($dok && $dok->status_pinjaman == 0)
                        <tr
                            class="border-b-2 bg-white odd:bg-gray-100 even:bg-gray-50 hover:bg-slate-100 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                            <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                scope="row">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $dok->jenis }}
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="me-2 inline-block rounded-full bg-green-200 px-7 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">Tersedia</span>

                            </td>
                            <td class="px-6 py-4">
                                {{ $dok->no_dokumen }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $dok->tanggal_terima }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $dok->tanggal_terbit }}
                            </td>
                            <td class="px-8 py-4">
                                {{ $dok->tanggal_jatuh_tempo }}
                            </td>
                            <td class="flex flex-col items-center justify-between px-4 py-4">
                                <button class="mb-3" id="button-show-modal" data-modal-target="show-modal"
                                    data-modal-toggle="show-modal" type="button"
                                    wire:click="showDokumen({{ $dok->id }})">
                                    <svg class="h-[16px] w-[16px] text-yellow-300 hover:text-gray-900 dark:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                </button>
                                <button class="mb-3" id="button-edit-modal" data-modal-target="edit-modal"
                                    data-modal-toggle="edit-modal" type="button"
                                    wire:click="editDokumen({{ $dok->id }})">
                                    <svg class="h-[16px] w-[16px] text-blue-600 hover:text-blue-900 dark:text-white"
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
                                    wire:click="deleteDokumen({{ $dok->id }})">
                                    <svg class="h-[16px] w-[16px] text-red-600 hover:text-red-900 dark:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 18 20">
                                        <path
                                            d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                                    </svg>
                                </button>
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
                            <td class="px-6 py-4">
                                <span
                                    class="me-2 inline-block rounded-full bg-yellow-200 px-7 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">Dipinjam</span>

                            </td>
                            <td class="px-6 py-4">
                                {{ $dok->no_dokumen }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $dok->tanggal_terima }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $dok->tanggal_terbit }}
                            </td>
                            <td class="px-8 py-4">
                                {{ $dok->tanggal_jatuh_tempo }}
                            </td>
                            <td class="flex flex-col items-center justify-between px-4 py-4">
                                <button class="mb-3" id="button-show-modal" data-modal-target="show-modal"
                                    data-modal-toggle="show-modal" type="button"
                                    wire:click="showDokumen({{ $dok->id }})">
                                    <svg class="h-[16px] w-[16px] text-yellow-300 hover:text-gray-900 dark:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                </button>
                                <button class="mb-3" id="button-edit-modal" data-modal-target="edit-modal"
                                    data-modal-toggle="edit-modal" type="button"
                                    wire:click="editDokumen({{ $dok->id }})">
                                    <svg class="h-[16px] w-[16px] text-blue-600 hover:text-blue-900 dark:text-white"
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
                                    wire:click="deleteDokumen({{ $dok->id }})">
                                    <svg class="h-[16px] w-[16px] text-red-600 hover:text-red-900 dark:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 18 20">
                                        <path
                                            d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                                    </svg>
                                </button>
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
                            <td class="px-6 py-4">
                                <span
                                    class="inline-inline-block rounded-full bg-red-200 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:bg-red-900 dark:text-red-300">
                                    Belum Tersedia
                                </span>
                            </td>
                            <td class="px-8 py-4">
                                -
                            </td>
                            <td class="px-8 py-4">
                                -
                            </td>
                            <td class="px-8 py-4">
                                -
                            </td>
                            <td class="px-8 py-4">
                                -
                            </td>
                            <td class="px-6 py-4">
                                <button
                                    class="inline-flex w-full items-center rounded-lg bg-blue-700 px-4 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto"
                                    id="button-create-modal" data-modal-target="create-modal"
                                    data-modal-toggle="create-modal" type="button"
                                    wire:click="createDokumen('{{ $jenis }}')">
                                    <svg class="h-3 w-3 text-white dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 1v16M1 9h16" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endif
                @endforeach

                @if ($roya)
                    <tr
                        class="border-b-2 bg-white odd:bg-gray-100 even:bg-gray-50 hover:bg-slate-100 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                            scope="row">
                            11
                        </th>
                        <td class="px-6 py-4">
                            Roya
                        </td>
                        <td class="px-6 py-4">
                            @if ($roya->status_pinjaman == 0)
                                <span
                                    class="me-2 inline-block rounded-full bg-green-200 px-7 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">Tersedia</span>
                            @else
                                <span
                                    class="me-2 inline-block rounded-full bg-yellow-200 px-7 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">Dipinjam</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{ $roya->no_surat }}
                        </td>
                        <td class="px-6 py-4">
                            -
                        </td>
                        <td class="px-6 py-4">
                            {{ $roya->created_at }}
                        </td>
                        <td class="px-8 py-4">
                            -
                        </td>
                        <td class="flex flex-col items-center justify-between px-4 py-4">
                            {{-- <button class="mb-3" id="button-show-modal" data-modal-target="show-modal"
                                data-modal-toggle="show-modal" type="button"
                                wire:click="showDokumen({{ $dok->id }})">
                                <svg class="h-[16px] w-[16px] text-yellow-300 hover:text-gray-900 dark:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                            </button> --}}
                            {{-- <button class="mb-3" id="button-edit-modal" data-modal-target="edit-modal"
                                data-modal-toggle="edit-modal" type="button"
                                wire:click="editDokumen({{ $dok->id }})">
                                <svg class="h-[16px] w-[16px] text-blue-600 hover:text-blue-900 dark:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 18">
                                    <path
                                        d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                                    <path
                                        d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                                </svg>
                                <div class="sr-only">Edit</div>
                            </button> --}}
                            {{-- <button id="button-delete-modal" data-modal-target="delete-modal"
                                data-modal-toggle="delete-modal" type="button"
                                wire:click="deleteDokumen({{ $dok->id }})">
                                <svg class="h-[16px] w-[16px] text-red-600 hover:text-red-900 dark:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 18 20">
                                    <path
                                        d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                                </svg>
                            </button> --}}
                        </td>
                    </tr>
                @else
                    <tr
                        class="border-b-2 bg-white odd:bg-gray-100 even:bg-gray-50 hover:bg-slate-100 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                            scope="row">
                            11
                        </th>
                        <td class="px-6 py-4">
                            Roya
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="inline-inline-block rounded-full bg-red-200 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:bg-red-900 dark:text-red-300">
                                Belum Tersedia
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            -
                        </td>
                        <td class="px-6 py-4">
                            -
                        </td>
                        <td class="px-6 py-4">
                            -
                        </td>
                        <td class="px-8 py-4">
                            -
                        </td>
                        <td class="flex flex-col items-center justify-between px-4 py-4">
                            {{-- <button class="mb-3" id="button-show-modal" data-modal-target="show-modal"
                        data-modal-toggle="show-modal" type="button"
                        wire:click="showDokumen({{ $dok->id }})">
                        <svg class="h-[16px] w-[16px] text-yellow-300 hover:text-gray-900 dark:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                    </button> --}}
                            {{-- <button class="mb-3" id="button-edit-modal" data-modal-target="edit-modal"
                        data-modal-toggle="edit-modal" type="button"
                        wire:click="editDokumen({{ $dok->id }})">
                        <svg class="h-[16px] w-[16px] text-blue-600 hover:text-blue-900 dark:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path
                                d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                            <path
                                d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                        </svg>
                        <div class="sr-only">Edit</div>
                    </button> --}}
                            {{-- <button id="button-delete-modal" data-modal-target="delete-modal"
                        data-modal-toggle="delete-modal" type="button"
                        wire:click="deleteDokumen({{ $dok->id }})">
                        <svg class="h-[16px] w-[16px] text-red-600 hover:text-red-900 dark:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 20">
                            <path
                                d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                        </svg>
                    </button> --}}
                        </td>
                    </tr>
                @endif

            </tbody>
        </table>
    </div>
    <a class="mt-4 inline-flex w-full items-center rounded-lg bg-gray-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 sm:w-auto"
        href="{{ route('penerimaan.index') }}">
        <svg class="mr-2 h-4 w-4 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 16 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 7 1 4l3-3m0 12h6.5a4.5 4.5 0 1 0 0-9H2" />
        </svg>
        Kembali
    </a>

</div>
