<!-- Large Modal -->
<div class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full overflow-y-auto overflow-x-hidden p-4 md:inset-5"
    id="create-modal" tabindex="-1" wire:ignore>
    <div class="relative max-h-full w-full max-w-4xl">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between rounded-t border-b bg-blue-600 p-4 dark:border-gray-600 md:p-3">
                <h3 class="text-xl font-medium text-white dark:text-white">
                    Tambah Dokumen
                </h3>
                <button
                    class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-white hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    id="close-create-modal" data-modal-hide="create-modal" type="button">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="space-y-4 bg-slate-100 p-4 md:p-5">

                <form wire:submit.prevent="storeDokumen">
                    <div class="mb-6 grid gap-6 md:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                for="no_dokumen">Nomor Dokumen</label>
                            <input
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                id="no_dokumen" type="text" wire:model="no_dokumen" placeholder="Nomor dokumen">
                            @error('no_dokumen')
                                <div class="mb-4 mt-1 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <div class="text-sm font-semibold">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                for="jenis">Jenis</label>
                            <select
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                id="jenis" name="jenis" wire:model="jenis">
                                <option value="" selected>Pilih jenis</option>
                                <option value="PPJB">PPJB</option>
                                <option value="AJB">AJB</option>
                                <option value="SKMHT">SKMHT</option>
                                <option value="APHT">APHT</option>
                                <option value="PH">PH</option>
                                <option value="SHT">SHT</option>
                                <option value="IMB">IMB</option>
                                <option value="Sertipikat">Sertipikat</option>
                                <option value="PK">PK</option>
                                <option value="CN">CN</option>
                            </select>
                            @error('jenis')
                                <div class="mb-4 mt-1 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <div class="text-sm font-semibold">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                for="tanggal_terima">Tanggal Terima</label>
                            <input
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                id="tanggal_terima" type="date" wire:model="tanggal_terima">
                            @error('tanggal_terima')
                                <div class="mb-4 mt-1 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <div class="text-sm font-semibold">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                for="tanggal_terbit">Tanggal Terbit</label>
                            <input
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                id="tanggal_terbit" type="date" wire:model="tanggal_terbit">
                            @error('tanggal_terbit')
                                <div class="mb-4 mt-1 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <div class="text-sm font-semibold">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                for="tanggal_jatuh_tempo">Tanggal Jatuh Tempo</label>
                            <input
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                id="tanggal_jatuh_tempo" type="date" wire:model="tanggal_jatuh_tempo">
                            @error('tanggal_jatuh_tempo')
                                <div class="mb-4 mt-1 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <div class="text-sm font-semibold">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                for="file">File</label>
                            <input
                                class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
                                id="file" type="file" aria-describedby="file_help" wire:model="file">
                            @error('file')
                                <div class="mb-4 mt-1 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <div class="text-sm font-semibold">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button
                        class="inline-flex w-full items-center justify-center rounded-lg bg-blue-700 px-[127px] py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="submit">
                        <svg class="-ms-1 me-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Tambah Dokumen
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
