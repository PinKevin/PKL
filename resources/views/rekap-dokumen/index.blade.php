@extends('layouts.content')

@section('page_title')
    Dokumen Tersedia
@endsection

@push('styles')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('closeCreateModal', (event) => {
                let createButton = $('#close-create-modal');
                createButton.click();

                window.scrollTo(0, 0);
            });

            Livewire.on('closeEditModal', (event) => {
                let updateButton = $('#close-edit-modal');
                updateButton.click();

                window.scrollTo(0, 0);
            });

            Livewire.on('scrollToTop', (event) => {
                window.scrollTo(0, 0);
            });
        });
    </script>
@endpush

@section('content')
    <div>
        @if (session('pesan'))
            <div class="mt-1 flex w-[px] items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="text-sm font-semibold">
                    {{ session('pesan') }}
                </div>
            </div>
        @endif

        <h2 class="text-4xl font-semibold text-gray-900 dark:text-gray-100">Cek Dokumen</h2>

        <div class="mb-2 mt-2 flex items-center justify-between">
            <form action="{{ route('rekap-dokumen.search') }}" method="POST">
                @csrf
                <div class="bg-slate-100 py-2.5 dark:bg-gray-900">
                    <div class="inline-flex justify-start">
                        <div class="relative">
                            <label class="sr-only" for="table-search">Search</label>
                            <div
                                class="rtl:inset-r-0 pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input
                                class="block w-60 rounded-lg border-2 border-gray-300 bg-gray-50 ps-10 pt-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 lg:w-[500px]"
                                id="table-search" name="search" type="search" value="{{ old('search') }}"
                                placeholder="Search for items">
                        </div>
                        <button
                            class="ml-4 inline-flex w-full items-center rounded-lg bg-blue-700 px-3 py-0.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto"
                            type="submit">
                            <svg class="mr-2 h-4 w-4 text-white dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                            </svg>
                            Cari Debitur
                        </button>
                    </div>
                </div>
                <div>
                    @error('search')
                        <div class="mt-1 flex w-[px] items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
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
            </form>
        </div>

        {{-- {!! $allDokumen !!} --}}
        {{-- <div class="relative mt-4 overflow-x-auto shadow-lg sm:rounded-md">
            <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                <thead class="bg-slate-300 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-4" scope="col">
                            No
                        </th>
                        <th class="px-7 py-4" scope="col">
                            <button class="flex items-center uppercase" wire:click="sortResult('no_debitur')">
                                Nomor Debitur
                                <svg class="ms-1.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg>
                            </button>
                        </th>
                        <th class="px-7 py-4" scope="col">
                            <button class="flex items-center uppercase" wire:click="sortResult('nama_debitur')">
                                Nama Debitur
                                <svg class="ms-1.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg>
                            </button>
                        </th>
                        <th class="px-4 py-4" scope="col">
                            Dokumen
                        </th>
                        <th class="px-12 py-4" scope="col">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allDokumen as $dok)
                        <tr
                            class="border-b-2 bg-white odd:bg-slate-100 even:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                            <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white" scope="row"
                                rowspan="11">{{ $loop->iteration }}</th>
                            <td class="border-b-2 px-6 py-4 text-gray-600" rowspan="11">
                                {{ $dok->first()->debitur->no_debitur }}</td>
                            <td class="border-b-2 px-6 py-4 text-gray-600" rowspan="11">
                                {{ $dok->first()->debitur->nama_debitur }}</td>
                        </tr>
                        @foreach (['PPJB', 'AJB', 'SKMHT', 'APHT', 'PH', 'SHT', 'IMB', 'Sertipikat', 'PK', 'CN'] as $jenis)
                            @php
                                $d = $dok->where('jenis', $jenis)->first();
                            @endphp
                            @if ($d)
                                <tr
                                    class="border-b-2 bg-white text-gray-600 odd:bg-slate-100 even:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                                    <td class="px-6 py-1">
                                        {{ $jenis }}
                                    </td>
                                    <td class="px-6 py-1">
                                        @if ($d->status_pinjaman == 0)
                                            <span
                                                class="me-2 rounded border border-green-400 bg-green-200 px-[27px] py-0.5 text-xs font-medium text-green-800 dark:bg-gray-700 dark:text-green-400">Tersedia</span>
                                        @elseif ($d->status_keluar == 1)
                                            <span
                                                class="me-2 rounded-full bg-gray-700 px-6 py-0.5 text-xs font-medium text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300">Keluar</span>
                                        @elseif ($d->status_pinjaman == 1)
                                            <span
                                                class="me-2 rounded border border-yellow-300 bg-yellow-200 px-6 py-0.5 text-xs font-medium text-yellow-800 dark:bg-gray-700 dark:text-yellow-300">Dipinjam</span>
                                        @endif
                                    </td>
                                </tr>
                            @else
                                <tr
                                    class="border-b-2 bg-white odd:bg-slate-100 even:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                                    <td class="px-6 py-1">{{ $jenis }}</td>
                                    <td class="px-6 py-1">
                                        <span
                                            class="me-2 rounded border border-red-400 bg-red-200 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:bg-gray-700 dark:text-red-400">
                                            TIdak Tersedia
                                        </span>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div> --}}

        {{-- <div class="mt-4 items-center">
        {{ $allDokumen->links() }}
    </div> --}}
    </div>
@endsection
