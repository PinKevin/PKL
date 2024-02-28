<div class="mt-4 bg-slate-100 shadow-lg sm:rounded-lg" id="accordion-color" data-accordion="collapse"
    data-active-classes="bg-slate-200 mt-4 dark:bg-gray-800 text-blue-600 dark:text-white">
    <h2 id="accordion-color-heading-1">
        <button
            class="flex w-full items-center justify-between gap-3 rounded-t-xl border border-b-0 border-slate-200 p-5 font-medium text-gray-800 hover:bg-slate-200 focus:ring-4 focus:ring-slate-300 rtl:text-right dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 dark:focus:ring-blue-100"
            data-accordion-target="#accordion-color-body-1" type="button" aria-expanded="false"
            aria-controls="accordion-color-body-1">
            <span>Download Area</span>
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
                class="relative max-h-[400px] space-y-4 overflow-x-auto overflow-y-auto bg-slate-100 p-4 shadow-md md:p-5">
                <div class="grid grid-cols-4 gap-5 max-w-full">
                    @if ($bast)
                        <a class="items-center text-center w-full rounded-lg bg-blue-700 py-3 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            href="{{ route('pengambilan.cetak', ['id' => $bast->id]) }}">
                            Cetak BAST
                        </a>
                    @endif
                    @if ($suratRoya)
                        <a class="text-center items-center w-full rounded-lg bg-green-700 px-5 py-3 text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                            href="{{ route('surat-roya.cetak', ['id' => $suratRoya->id]) }}">
                            Cetak Roya
                        </a>
                    @endif
                    @if ($pelunasan)
                        <a class="text-center w-full items-center rounded-lg bg-orange-700 px-5 py-3 text-sm font-medium text-white hover:bg-orange-800 focus:outline-none focus:ring-4 focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800"
                            id="button-show-pelunasan" data-modal-target="show-pelunasan"
                            data-modal-toggle="show-pelunasan" type="button">
                            Cetak Pelunasan
                        </a>

                        <!-- Main modal -->
                        <div class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-9"
                            id="show-pelunasan" aria-hidden="true" tabindex="-1" wire:ignore.self>
                            <div class="relative max-h-full w-full max-w-4xl p-4">
                                <!-- Modal content -->
                                <div class="relative rounded-lg bg-blue-600 shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between rounded-t border-b p-4 dark:border-gray-600 md:p-3">
                                        <h3 class="text-lg font-semibold text-white dark:text-white">
                                            File Pelunasan
                                        </h3>
                                        <button
                                            class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-white hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-toggle="show-pelunasan" type="button">
                                            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <embed src="/storage/{{ $pelunasan }}" type="application/pdf" width="100%"
                                        height="600">
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($bastTtd)
                        <button
                            class=" items-center text-center rounded-lg bg-lime-700 px-5 py-2 text-sm font-medium text-white hover:bg-lime-800 focus:outline-none focus:ring-4 focus:ring-lime-300 dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring-lime-800"
                            id="button-show-bast" data-modal-target="show-bast" data-modal-toggle="show-bast"
                            type="button">
                            Lihat Berita Acara Bertanda Tangan
                        </button>

                        <!-- Main modal -->
                        <div class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-9"
                            id="show-bast" aria-hidden="true" tabindex="-1" wire:ignore.self>
                            <div class="relative max-h-full w-full max-w-4xl p-4">
                                <!-- Modal content -->
                                <div class="relative rounded-lg bg-blue-600 shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between rounded-t border-b p-4 dark:border-gray-600 md:p-3">
                                        <h3 class="text-lg font-semibold text-white dark:text-white">
                                            File BAST
                                        </h3>
                                        <button
                                            class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-white hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-toggle="show-bast" type="button">
                                            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <embed src="/storage/{{ $bastTtd->file_bast }}" type="application/pdf"
                                        width="100%" height="600">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
