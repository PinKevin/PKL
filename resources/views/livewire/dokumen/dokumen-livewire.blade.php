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

    <button
        class="block w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 md:w-auto"
        data-modal-target="create-modal" data-modal-toggle="create-modal" type="button">
        Tambah dokumen
    </button>

    @include('livewire.dokumen.create-modal')
    @include('livewire.dokumen.edit-modal')
    @include('livewire.dokumen.delete-modal')

    <div id="accordion-open" data-accordion="open">
        @forelse ($dokumen as $dok)
            <h2 id="accordion-open-heading-{{ $loop->index }}">
                <button
                    class="@if ($loop->first) mt-3 rounded-t-lg @endif @if ($loop->last) border-b @else border-b-0 @endif flex w-full items-center justify-between gap-3 border border-gray-400 bg-gray-200 p-5 font-medium text-gray-950 hover:bg-gray-400 focus:ring-4 focus:ring-gray-200 rtl:text-right dark:border-gray-700 dark:text-gray-400 dark:hover:bg-slate-500 dark:focus:ring-gray-800"
                    data-accordion-target="#accordion-open-body-{{ $loop->index }}" type="button"
                    aria-controls="accordion-open-body-{{ $loop->index }}">
                    <span class="flex items-center">
                        {{ $dok->jenis }}
                    </span>
                    <svg class="h-3 w-3 shrink-0 rotate-180" data-accordion-icon aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div class="hidden" id="accordion-open-body-{{ $loop->index }}"
                aria-labelledby="accordion-open-heading-{{ $loop->index }}">
                <div class="border-2 border-b-0 border-gray-200 p-5 dark:border-gray-700 dark:bg-gray-900">
                    <table
                        class="border-3 relative w-full overflow-x-auto text-left text-sm text-gray-500 shadow-md rtl:text-right dark:text-gray-400 sm:rounded-md">
                        <thead
                            class="border-b bg-blue-400 text-xs uppercase text-gray-900 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-4 py-3" scope="col">
                                    Nomor Dokumen
                                </th>
                                <th class="px-5 py-4" scope="col">
                                    Tanggal Terima
                                </th>
                                <th class="px-5 py-4" scope="col">
                                    Tanggal Terbit
                                </th>
                                <th class="px-5 py-4" scope="col">
                                    Tanggal Jatuh Tempo
                                </th>
                                <th class="px-5 py-4" scope="col">
                                    Dipinjam
                                </th>
                        <tbody>
                            <tr
                                class="border-b-2 bg-white odd:bg-gray-100 even:bg-gray-50 hover:bg-slate-100 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                                <th class="whitespace-nowrap px-6 py-4 font-normal text-gray-900 dark:text-white"
                                    scope="row">
                                    {{ $dok->no_dokumen }}
                                </th>
                                <th class="whitespace-nowrap px-7 py-4 font-normal text-gray-900 dark:text-white"
                                    scope="row">
                                    {{ $dok->tanggal_terima }}
                                </th>
                                <th class="whitespace-nowrap px-7 py-4 font-normal text-gray-900 dark:text-white"
                                    scope="row">
                                    {{ $dok->tanggal_terbit }}
                                </th>
                                <th class="whitespace-nowrap px-8 py-4 font-normal text-gray-900 dark:text-white"
                                    scope="row">
                                    {{ $dok->tanggal_jatuh_tempo }}
                                </th>
                                <th class="whitespace-nowrap px-8 py-4 font-normal text-gray-900 dark:text-white"
                                    scope="row">
                                    {{ $dok->status_pinjaman }}
                                </th>
                        </tbody>
                    </table>

                    <table
                        class="w-flex border-3 relative mb-3 mt-3 overflow-x-auto text-left text-sm text-gray-500 shadow-md rtl:text-right dark:text-gray-400 sm:rounded-md">
                        <thead
                            class="border-b bg-blue-400 text-xs uppercase text-gray-900 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-4 py-3" scope="col">
                                    Tanggal Pinjaman
                                </th>
                                <th class="px-5 py-4" scope="col">
                                    Tanggal Pengembalian
                                </th>
                        <tbody>
                            <tr
                                class="border-b-2 bg-white odd:bg-gray-100 even:bg-gray-50 hover:bg-slate-100 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                                <th class="whitespace-nowrap px-6 py-4 font-normal text-gray-900 dark:text-white"
                                    scope="row">
                                    {{ $dok->no_dokumen }}
                                </th>
                                <th class="whitespace-nowrap px-7 py-4 font-normal text-gray-900 dark:text-white"
                                    scope="row">
                                    {{ $dok->tanggal_terima }}
                                </th>
                                {{-- <th class="whitespace-nowrap px-7 py-4 font-normal text-gray-900 dark:text-white"
                                    scope="row">
                                    {{ $dok->tanggal_terbit }}
                                </th>
                                <th class="whitespace-nowrap px-8 py-4 font-normal text-gray-900 dark:text-white"
                                    scope="row">
                                    {{ $dok->tanggal_jatuh_tempo }}
                                </th>
                                <th class="whitespace-nowrap px-8 py-4 font-normal text-gray-900 dark:text-white"
                                    scope="row">
                                    {{ $dok->status_pinjaman }}
                                </th> --}}
                        </tbody>
                    </table>

                    <button
                        class="block w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 md:w-auto"
                        data-modal-target="edit-modal" data-modal-toggle="edit-modal" type="button"
                        wire:click="editDokumen({{ $dok->id }})">
                        Edit dokumen
                    </button>

                    <button
                        class="block w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 md:w-auto"
                        data-modal-target="delete-modal" data-modal-toggle="delete-modal" type="button"
                        wire:click="deleteDokumen({{ $dok->id }})">
                        Hapus dokumen
                    </button>

                    <embed src="/storage/{{ $dok->file }}" type="application/pdf" width="100%" height="600">
                </div>
            </div>
        @empty
            <h2 class="text-center text-lg font-semibold text-gray-900 dark:text-gray-100">Data tidak tersedia!</h2>
        @endforelse
    </div>
</div>
