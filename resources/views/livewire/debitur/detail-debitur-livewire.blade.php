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

    <h2 class="text-4xl font-semibold text-gray-900 dark:text-gray-100">Daftar Berkas</h2>

    <hr class="my-8 h-2 rounded-md bg-slate-300 dark:bg-gray-700">

    {{-- <div class="p-4 sm:ml-64"> --}}
    {{-- <div class="border-gray-900"> --}}
    {{-- <div class="mt-14 rounded-md bg-gray-500 p-3 dark:border-gray-700"> --}}
    <h2 class="mb-3 inline-flex text-4xl font-semibold text-gray-900 dark:text-gray-100">Daftar Berkas</h2>
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}

    {{-- <div class="">
        <h2 class="text-4xl font-semibold text-gray-900 dark:text-gray-100">Daftar Berkas</h2>
    </div> --}}

    <div id="accordion-open" data-accordion="open">
        @forelse ($dokumen as $dok)
            <h2 id="accordion-open-heading-{{ $loop->index }}">
                <button
                    class="mt-3 flex w-full items-center justify-between gap-3 rounded-t-lg bg-gray-200 p-5 font-medium text-gray-950 hover:bg-gray-400 focus:ring-4 focus:ring-gray-200 rtl:text-right dark:border-gray-700 dark:text-gray-400 dark:hover:bg-slate-500 dark:focus:ring-gray-800"
                    data-accordion-target="#accordion-open-body-{{ $loop->index }}" type="button"
                    aria-expanded="true" aria-controls="accordion-open-body-{{ $loop->index }}">
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
                <div class="border-2 border-b-2 border-gray-200 bg-gray-100 p-5 dark:border-gray-700 dark:bg-gray-900">
                    {{-- <p class=" font-normal text-gray-900 dark:text-gray-400">
                        Nomor Dokumen : {{ $dok->no_dokumen }}
                    </p>
                    <p class="font-normal text-gray-900 dark:text-gray-400">
                        Tanggal Terima : {{ $dok->tanggal_terima }}
                    </p>
                    <p class="font-normal text-gray-900 dark:text-gray-400">
                        Tanggal Terbit : {{ $dok->tanggal_terbit }}
                    </p>
                    <p class="font-normal text-gray-900 dark:text-gray-400">
                        Tanggal Jatuh Tempo : {{ $dok->tanggal_jatuh_tempo }}
                    </p>
                    <p class="font-normal text-gray-900 dark:text-gray-400">
                        Dipinjam : {{ $dok->status_pinjaman }}
                    </p> --}}
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
                        class="w-flex border-3 relative mt-3 overflow-x-auto text-left text-sm text-gray-500 shadow-md rtl:text-right dark:text-gray-400 sm:rounded-md">
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
                    {{-- <p class="mt-2 ml-1 font-normal text-gray-900 dark:text-gray-400">
                        File :
                    </p>
                    <embed src="/storage/{{ $dok->file }}" type="application/pdf" width="100%" height="600"> --}}
                </div>
            </div>
        @empty
            <h2 class="text-center text-lg font-semibold text-gray-900 dark:text-gray-100">Data tidak tersedia!</h2>
        @endforelse
    </div>
    <div class="mt-4 flex items-center justify-start">
        <a class="mr-2 inline-flex w-full items-center rounded-lg bg-gray-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 sm:w-auto"
            href="{{ route('debitur.index') }}">
            <svg class="mr-2 h-4 w-4 text-white dark:text-white" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 7 1 4l3-3m0 12h6.5a4.5 4.5 0 1 0 0-9H2" />
            </svg>
            Kembali
        </a>
    </div>

    @livewire('dokumen-livewire', ['debiturId' => $id])

</div>
