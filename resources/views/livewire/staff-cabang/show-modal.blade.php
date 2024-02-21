<!-- Main modal -->
<div class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0"
    id="show-modal" aria-hidden="true" tabindex="-1" wire:ignore.self>
    <div class="relative max-h-full w-full max-w-lg p-4">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-blue-600 shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between rounded-t border-b p-4 dark:border-gray-600 md:p-3">
                <h3 class="text-lg font-semibold text-white dark:text-white">
                    Staff {{ $nama }}
                </h3>
                <button
                    class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-white hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="show-modal" type="button">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="bg-slate-100 p-4 md:p-5">
                <div class="mb-4 grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label class="ml-1 mb-1 block text-sm font-medium text-gray-900 dark:text-white" for="nip">
                            NIP
                        </label>
                        <input
                            class="block w-full cursor-not-allowed rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="nip" name="nip" type="text" disabled wire:model="nip" />
                    </div>
                    <div class="col-span-2">
                        <label class="ml-1 mb-1 block text-sm font-medium text-gray-900 dark:text-white"
                            for="nama">Nama
                        </label>
                        <input
                            class="block w-full cursor-not-allowed rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="nama" name="nama" type="text" disabled wire:model="nama" />
                    </div>
                    <div class="col-span-2">
                        <label class="ml-1 mb-1 block text-sm font-medium text-gray-900 dark:text-white"
                            for="kantor">Kantor
                        </label>
                        <input
                            class="block w-full cursor-not-allowed rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="kantor" name="kantor" type="text" disabled wire:model="kantor" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
