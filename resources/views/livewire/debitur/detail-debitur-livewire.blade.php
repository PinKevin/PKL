<div>
    <h2 class="text-4xl font-semibold text-gray-900 dark:text-gray-100">Detail Debitur</h2>
    <form class="ml-0.5 mt-4">
        <div class="mb-6 grid gap-6 md:grid-cols-2">
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="no_debitur">
                    Nomor Debitur
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="no_debitur" type="text" wire:model="no_debitur" disabled>
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="nama_debitur">
                    Nama Debitur
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="nama_debitur" type="text" wire:model="nama_debitur" disabled>
            </div>
        </div>
    </form>

    <h2 class="text-4xl font-semibold text-gray-900 dark:text-gray-100">Daftar Berkas</h2>
    <div id="accordion-open" data-accordion="open">
        @forelse ($dokumen as $dok)
            <h2 id="accordion-open-heading-{{ $loop->index }}">
                <button
                    class="flex w-full items-center justify-between gap-3 rounded-t border border-b-0 border-gray-200 p-5 font-medium text-gray-500 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 rtl:text-right dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 dark:focus:ring-gray-800"
                    data-accordion-target="#accordion-open-body-{{ $loop->index }}" type="button" aria-expanded="true"
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
                <div class="border border-b-0 border-gray-200 p-5 dark:border-gray-700 dark:bg-gray-900">
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
