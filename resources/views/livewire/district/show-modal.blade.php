<!-- Main modal -->
<div class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden shadow-lg md:inset-0"
    id="show-modal" aria-hidden="true" tabindex="-1" wire:ignore.self>
    <div class="relative max-h-full w-full max-w-md p-4">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-blue-600 shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between rounded-t border-b p-2 dark:border-gray-600 md:p-3">
                <h3 class="text-lg font-semibold text-white dark:text-white">
                    Detail Kecamatan
                </h3>
                <button
                    class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-white hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    id="close-show-modal" data-modal-toggle="show-modal" type="button">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="rounded-b-md bg-slate-100 p-4 md:p-5">
                <div class="mb-4 grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label class="mb-1 ml-1 block text-sm font-medium text-gray-900 dark:text-white"
                            for="code">Kode Kecamatan
                        </label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="code" name="code" type="text" title="Masukkan hanya angka!"
                            aria-describedby="helper-nomor-developer" disabled placeholder="Kode Kecamatan"
                            wire:model="code" maxlength="7" pattern="[0-9]*" />
                    </div>
                    <div class="col-span-2">
                        <label class="mb-1 ml-1 block text-sm font-medium text-gray-900 dark:text-white"
                            for="regency_id">
                            Kota
                        </label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="regency_name" name="regency_name" type="text" disabled wire:model="regency_name" />
                    </div>
                    <div class="col-span-2">
                        <label class="mb-1 ml-1 block text-sm font-medium text-gray-900 dark:text-white" for="name">
                            Nama Kecamatan
                        </label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="name" name="name" type="text" placeholder="Nama Kecamatan" disabled
                            wire:model="name" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
