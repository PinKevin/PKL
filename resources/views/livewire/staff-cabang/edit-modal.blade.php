<!-- Main modal -->
<div class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden shadow-lg md:inset-0"
    id="edit-modal" aria-hidden="true" tabindex="-1" wire:ignore.self>
    <div class="relative max-h-full w-full max-w-md p-4">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-blue-600 shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between rounded-t border-b p-2 dark:border-gray-600 md:p-3">
                <h3 class="text-lg font-semibold text-white dark:text-white">
                    Edit Staff Cabang {{ $nama }}
                </h3>
                <button
                    class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-white hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    id="close-edit-modal" data-modal-toggle="edit-modal" type="button">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="rounded-b-md bg-slate-100 p-4 md:p-5" wire:submit.prevent="updateStaffCabang" method="POST">
                <div class="mb-4 grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label class="ml-1 mb-1 block text-sm font-medium text-gray-900 dark:text-white" for="nip">
                            NIP
                        </label>
                        <input
                            class="block w-full cursor-not-allowed rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="nip" name="nip" type="text" disabled placeholder="NIP" wire:model="nip" />
                    </div>
                    <div class="col-span-2">
                        <label class="ml-1 mb-1 block text-sm font-medium text-gray-900 dark:text-white" for="nama">
                            Nama
                        </label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="nama" name="nama" type="text" placeholder="Nama" wire:model="nama" />
                        @error('nama')
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
                    <div class="col-span-2">
                        <label class="ml-1 mb-1 block text-sm font-medium text-gray-900 dark:text-white" for="kantor">
                            Kantor
                        </label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="kantor" name="kantor" type="text" placeholder="Kantor" wire:model="kantor" />
                        @error('kantor')
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
                    class="inline-flex items-center rounded-lg bg-blue-700 px-[123px] py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="submit">
                    <svg class="-ms-1 me-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Edit Staff Cabang
                </button>
            </form>
        </div>
    </div>
</div>
