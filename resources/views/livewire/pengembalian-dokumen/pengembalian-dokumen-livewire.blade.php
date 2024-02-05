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
                {!! session('storeSuccess') !!}
            </div>
        </div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
            <caption
                class="bg-slate-300 p-5 text-left text-lg font-semibold text-gray-900 rtl:text-right dark:bg-gray-800 dark:text-white">
                Hasil Pencarian "{{ $debitur->nama_debitur }}, {{ $debitur->no_debitur }}"
            </caption>
            <thead class="bg-slate-200 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3" scope="col">
                        Nama Debitur
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Nomor Debitur
                    </th>
                    {{-- <th class="px-6 py-3" scope="col">
                        Riwayat Peminjaman
                    </th> --}}
                </tr>
            </thead>
            <tbody>
                <tr class="border-b-2 bg-white odd:bg-gray-100 even:bg-gray-50 dark:border-gray-700 dark:bg-gray-800">
                    <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white" scope="row">
                        {{ $debitur->nama_debitur }}
                    </th>
                    <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                        {{ $debitur->no_debitur }}
                    </td>
                    {{-- <td>
                        <button
                            class="ml-10 mr-16 flex rounded-lg bg-blue-600 px-5 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto"
                            id="button-show-bast-log-modal" data-modal-target="show-bast-log-modal"
                            data-modal-toggle="show-bast-log-modal" type="button" wire:click="showBastLog()">
                            Riwayat
                        </button>
                    </td> --}}
                </tr>
            </tbody>
        </table>
    </div>

    <div class="relative mt-3 overflow-x-auto shadow-lg sm:rounded-md">
        <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
            <thead class="bg-slate-300 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3" scope="col">
                        No
                    </th>
                    <th class="px-6 py-4" scope="col">
                        <button class="flex items-center uppercase" wire:click="sortResult('kode_notaris')">
                            Jenis
                            <svg class="ms-1.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg>
                        </button>
                    </th>
                    <th class="px-5 py-4" scope="col">
                        <button class="flex items-center uppercase" wire:click="sortResult('nama_notaris')">
                            Tersedia
                            <svg class="ms-1.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg>
                        </button>
                    </th>
                    <th class="px-4 py-4 text-center" scope="col">
                        Detail
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach (['PPJB', 'AJB', 'SKMHT', 'APHT', 'PH', 'SHT', 'IMB', 'Sertipikat', 'PK', 'CN'] as $jenis)
                    @php
                        $dok = $dokumen->where('jenis', $jenis)->first();
                        $shtSelected = false;
                    @endphp

                    @if ($dok && $dok->status_pinjaman == 0)
                        <tr
                            class="border-b-2 bg-white odd:bg-gray-100 even:bg-gray-50 hover:bg-slate-100 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                            <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                scope="row">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $dok->jenis }}
                            </td>
                            <td class="px-2 py-4">
                                <span
                                    class="me-2 inline-block rounded-full bg-green-200 px-7 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">Tersedia</span>

                            </td>
                            <td class="flex flex-col items-center justify-between px-2 py-4">
                                -
                            </td>
                        </tr>
                    @elseif ($dok && $dok->status_pinjaman == 1)
                        <tr
                            class="border-b-2 bg-white odd:bg-gray-100 even:bg-gray-50 hover:bg-slate-100 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                            <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                scope="row">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $dok->jenis }}
                            </td>
                            <td class="px-2 py-4">
                                <span
                                    class="me-1 inline-block rounded-full bg-yellow-200 px-7 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">Dipinjam</span>
                            </td>
                            <td class="flex flex-col items-center px-2 py-4">
                                <div class="flex items-center">
                                    <input
                                        class="mb-2 h-4 w-4 rounded border-gray-300 bg-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        id="checkbox-{{ $dok->id }}" type="checkbox" value="{{ $jenis }}"
                                        wire:model.live="checkedDokumen">
                                    <label class="mb-2 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        for="checkbox-{{ $dok->id }}">Pilih Dokumen</label>
                                </div>
                            </td>
                        </tr>
                    @else
                        <tr
                            class="border-b-2 bg-white odd:bg-gray-100 even:bg-gray-50 hover:bg-slate-100 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                            <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                scope="row">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $jenis }}
                            </td>
                            <td class="px-2 py-4">
                                <span
                                    class="inline-block rounded-full bg-red-200 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:bg-red-900 dark:text-red-300">
                                    Belum Tersedia
                                </span>
                            </td>
                            <td class="px-8 py-4 text-center">
                                -
                            </td>
                        </tr>
                    @endif
                @endforeach

                @if ($roya)
                    <tr
                        class="border-b-2 bg-white odd:bg-gray-100 even:bg-gray-50 hover:bg-slate-100 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                            scope="row">
                            11
                        </th>
                        <td class="px-6 py-4">
                            Roya
                        </td>
                        <td class="px-2 py-4">
                            @if ($roya->status_pinjaman == 0)
                                <span
                                    class="me-2 inline-block rounded-full bg-green-200 px-7 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">Tersedia</span>
                            @else
                                <span
                                    class="me-2 inline-block rounded-full bg-yellow-200 px-7 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">Dipinjam</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            -
                        </td>
                    </tr>
                @else
                    <tr
                        class="border-b-2 bg-white odd:bg-gray-100 even:bg-gray-50 hover:bg-slate-100 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                            scope="row">
                            11
                        </th>
                        <td class="px-6 py-4">
                            Roya
                        </td>
                        <td class="px-2 py-4">
                            <span
                                class="inline-inline-block rounded-full bg-red-200 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:bg-red-900 dark:text-red-300">
                                Belum Tersedia
                            </span>
                        </td>
                        <td class="flex flex-col items-center justify-between px-4 py-4">
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    @error('checkedDokumen')
        <div class="mb-4 mt-2 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
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

    <div class="relative mt-4 overflow-x-auto bg-slate-100 shadow-lg sm:rounded-lg">
        <table class="bg-gray-100">
            <h1
                class="bg-slate-300 p-5 text-left text-xl font-semibold text-gray-900 rtl:text-right dark:bg-gray-800 dark:text-white">
                Pengisian Berita Acara Serah Terima Dokumen Pokok
            </h1>
            <form wire:submit.prevent="storePengembalian">
                <div class="mb-6 me-4 ms-4 mt-3 grid gap-7 md:grid-cols-2">
                    <div>
                        <label class="mb-2 ml-1 block text-sm font-medium text-gray-900 dark:text-white"
                            for="notaris_id">
                            Nama Notaris</label>
                        <select
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="notaris_id" name="notaris_id" wire:model.change="notaris_id">
                            <option value="">Pilih notaris</option>
                            @foreach ($notaris as $n)
                                <option value="{{ $n->id }}">{{ $n->kode_notaris }} - {{ $n->nama_notaris }}
                                </option>
                            @endforeach
                        </select>
                        @error('notaris_id')
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
                        <label class="mb-2 ml-1 block text-sm font-medium text-gray-900 dark:text-white"
                            for="peminjam">
                            Staff Notaris</label>
                        <select
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="peminjam" name="peminjam" wire:model="peminjam">
                            <option value="">Pilih Staff Notaris</option>
                            @foreach ($peminjamList as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                        @error('peminjam')
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
                        <label class="mb-2 ml-1 block text-sm font-medium text-gray-900 dark:text-white"
                            for="pendukung">Dokumen
                            Pendukung</label>
                        <textarea
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="pendukung" name="pendukung" placeholder="Dokumen penunjuk" wire:model="pendukung"></textarea>
                        @error('pendukung')
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
                        <label class="mb-2 ml-1 block text-sm font-medium text-gray-900 dark:text-white"
                            for="keperluan">Keperluan</label>
                        <textarea
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="keperluan" name="keperluan" placeholder="Keperluan peminjaman" wire:model="keperluan"></textarea>
                        @error('keperluan')
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
                        <label class="mb-2 ml-1 block text-sm font-medium text-gray-900 dark:text-white"
                            for="tanggal_kembali">Tanggal Kembali</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="tanggal_kembali" type="date" wire:model="tanggal_kembali">
                        @error('tanggal_kembali')
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
                        <label class="mb-2 ml-1 block text-sm font-medium text-gray-900 dark:text-white"
                            for="peminta">
                            Peminta</label>
                        <select
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="peminta" name="peminta" wire:model="peminta">
                            <option value="">Pilih Peminta</option>
                            @foreach ($pemintaList as $p)
                                <option value="{{ $p->id }}">
                                    {{ $p->nip }} - {{ $p->nama }} - {{ $p->kantor }}
                                </option>
                            @endforeach
                        </select>
                        @error('peminta')
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
                    class="mb-5 ms-4 w-full rounded-lg bg-blue-700 px-8 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto"
                    type="submit">Submit</button>
            </form>
        </table>
    </div>

</div>
