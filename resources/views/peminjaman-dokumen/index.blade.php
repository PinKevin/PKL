@extends('layouts.content')

@section('page_title')
    Penerimaan
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

        <h2 class="text-4xl font-semibold text-gray-900 dark:text-gray-100">Peminjaman Dokumen</h2>

        <div class="mb-2 mt-2 flex items-center justify-between">
            <form action="{{ route('peminjaman.search') }}" method="POST">
                @csrf
                <div class="bg-slate-100 py-2.5 dark:bg-gray-900">
                    <div class="inline-flex justify-start">
                        <div class="relative mt-1">
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
    </div>
@endsection
