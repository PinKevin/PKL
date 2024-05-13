<div>
    <h2 class="text-4xl font-semibold text-gray-900 dark:text-gray-100">Tambah Role</h2>

    <form class="ml-0.5 mt-4" wire:submit.prevent="createRole" method="POST">
        <div class="max-w-56 mb-6">
            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="nama_role">
                Nama Role
            </label>
            <input
                class="block w-96 rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                id="nama_role" type="text" wire:model="nama_role" placeholder="Nama">
            @error('nama_role')
                <div class="mb-4 mt-1 w-96 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="text-sm font-semibold">
                        {{ $message }}
                    </div>
                </div>
            @enderror
        </div>
        <div class="mb-4 grid gap-4 md:grid-cols-2 justify-between">
            <div class="mb-6">
                <div>
                    <label class="mb-2 block text-lg font-medium text-gray-900 dark:text-white" for="akses">
                        Hak Akses Transaksi
                    </label>

                    @if ($transaksiPermissions->isNotEmpty())
                        @foreach ($transaksiPermissions as $permission)
                            <div class="mb-4 flex items-center">
                                <input
                                    class="h-4 w-4 rounded border-gray-300 bg-white text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    type="checkbox" value="{{ $permission->name }}" wire:model="akses">
                                <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    for="{{ $permission->name }}">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>

            <div class="mb-6">
                <div>
                    <label class="mb-2 block text-lg font-medium text-gray-900 dark:text-white" for="akses">
                        Hak Akses Laporan
                    </label>
                    @if ($reportPermissions->isNotEmpty())
                        @foreach ($reportPermissions as $permission)
                            <div class="mb-4 flex items-center">
                                <input
                                    class="h-4 w-4 rounded border-gray-300 bg-white text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    type="checkbox" value="{{ $permission->name }}" wire:model="akses">
                                <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    for="{{ $permission->name }}">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="mb-6">
                <div>
                    <label class="mb-2 block text-lg font-medium text-gray-900 dark:text-white" for="akses">
                        Hak Akses Master Data
                    </label>
                    @if ($masterDataPermissions->isNotEmpty())
                        @foreach ($masterDataPermissions as $permission)
                            <div class="mb-4 flex items-center">
                                <input
                                    class="h-4 w-4 rounded border-gray-300 bg-white text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    type="checkbox" value="{{ $permission->name }}" wire:model="akses">
                                <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    for="{{ $permission->name }}">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="mb-6">
                <div>
                    <label class="mb-2 block text-lg font-medium text-gray-900 dark:text-white" for="akses">
                        Hak Akses Akun
                    </label>
                    @if ($akunPermissions->isNotEmpty())
                        @foreach ($akunPermissions as $permission)
                            <div class="mb-4 flex items-center">
                                <input
                                    class="h-4 w-4 rounded border-gray-300 bg-white text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    type="checkbox" value="{{ $permission->name }}" wire:model="akses">
                                <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    for="{{ $permission->name }}">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                    @else
                        Belum tersedia
                    @endif
                </div>
            </div>
        </div>

        @error('akses')
            <div class="mb-4 mt-1 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="text-sm font-semibold">
                    {{ $message }}
                </div>
            </div>
        @enderror

        <div class="flex items-center justify-start">
            <a class="mr-2 inline-flex w-full items-center rounded-lg bg-gray-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 sm:w-auto"
                href="{{ route('hak-akses.index') }}">
                <svg class="mr-2 h-4 w-4 text-white dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 7 1 4l3-3m0 12h6.5a4.5 4.5 0 1 0 0-9H2" />
                </svg>
                Kembali
            </a>
            <button
                class="inline-flex w-full items-center rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto"
                type="submit">
                <svg class="-ms-1 me-1 h-5 w-5 text-white dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 5v9m-5 0H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2M8 9l4-5 4 5m1 8h.01" />
                </svg>
                Simpan
            </button>
        </div>

    </form>

    {{-- @foreach ($akses as $a)
        {{ $a }}
    @endforeach --}}

</div>
