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
                    <p class="mb-2 text-gray-500 dark:text-gray-400">
                        Nomor Dokumen: {{ $dok->no_dokumen }}
                    </p>
                    <p class="text-gray-500 dark:text-gray-400">
                        Tanggal Terima: {{ $dok->tanggal_terima }}
                    </p>
                    <p class="text-gray-500 dark:text-gray-400">
                        Tanggal Terbit: {{ $dok->tanggal_terbit }}
                    </p>
                    <p class="text-gray-500 dark:text-gray-400">
                        Tanggal Jatuh Tempo: {{ $dok->tanggal_jatuh_tempo }}
                    </p>
                    <p class="text-gray-500 dark:text-gray-400">
                        Dipinjam: {{ $dok->status_pinjaman }}
                    </p>
                    <p class="text-gray-500 dark:text-gray-400">
                        File:
                    </p>
                    <embed src="/storage/{{ $dok->file }}" type="application/pdf" width="100%" height="600">
                </div>
            </div>
        @empty
            <h2 class="text-center text-lg font-semibold text-gray-900 dark:text-gray-100">Data tidak tersedia!</h2>
        @endforelse
    </div>
</div>
