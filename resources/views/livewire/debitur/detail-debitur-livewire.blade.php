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
    <h2 class="text-4xl font-semibold text-gray-900 dark:text-gray-100">Detail Debitur</h2>
    <form class="ml-0.5 mt-4">
        <div class="mb-6 grid gap-6 md:grid-cols-2">
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="no_debitur">
                    Nomor Debitur
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="no_debitur" type="text" disabled wire:model="no_debitur" placeholder="Nomor debitur">
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="nama_debitur">
                    Nama debitur
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="nama_debitur" type="text" disabled wire:model="nama_debitur" placeholder="Nama debitur">
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="tanggal_realisasi">
                    Tanggal Realisasi
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="tanggal_realisasi" type="date" disabled wire:model="tanggal_realisasi"
                    placeholder="Kota BPN">
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="jenis_kredit">
                    Jenis Kredit
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="jenis_kredit" type="text" disabled wire:model="jenis_kredit" placeholder="Jenis kredit">
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="nam_developer">
                    Developer
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="nama_developer" type="text" disabled wire:model="nama_developer" placeholder="Developer">
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="proyek_perumahan">
                    Proyek Perumahan
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="proyek_perumahan" type="text" disabled wire:model="proyek_perumahan"
                    placeholder="Proyek perumahan">
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="nama_notaris">
                    Notaris
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="nama_notaris" type="text" disabled wire:model="nama_notaris" placeholder="Notaris">
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="plafon_kredit">
                    Plafon Kredit
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="plafon_kredit" type="number" disabled wire:model="plafon_kredit" placeholder="Plafon kredit">
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="saldo_pokok">
                    Saldo Pokok
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="saldo_pokok" type="number" disabled wire:model="saldo_pokok" placeholder="Saldo pokok">
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="blok">
                    Blok
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="blok" type="text" disabled wire:model="blok" placeholder="Blok">
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="no">
                    Nomor Rumah
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="no" type="number" disabled wire:model="no" placeholder="Nomor rumah">
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="luas_tanah">
                    Luas Tanah
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="luas_tanah" type="number" disabled wire:model="luas_tanah" placeholder="Luas tanah">
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="luas_bangunan">
                    Luas Bangunan
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="luas_bangunan" type="number" disabled wire:model="luas_bangunan"
                    placeholder="Luas bangunan">

            </div>
        </div>
    </form>

    <hr class="my-8 h-2 rounded-md bg-slate-300 dark:bg-gray-700">
    <h2 class="text-4xl font-semibold text-gray-900 dark:text-gray-100">Daftar Berkas</h2>

    @livewire('dokumen-livewire', ['debiturId' => $id])

</div>