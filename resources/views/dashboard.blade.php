@extends('layouts.content')

@section('page_title')
    Dashboard
@endsection

@section('link_bantuan')
    {{ route('bantuan.dashboard') }}
@endsection

@section('content')
    <h2 class="text-4xl font-semibold dark:text-white">Selamat datang,</h2>
    <h3 class="text-2xl dark:text-white">{{ auth()->user()->nama }}</h3>
    <h5 class="text-lg dark:text-white">NIP. {{ auth()->user()->nip }}</h5>


    <div class="mt-8 bg-white">
        <div class="flex items-center rounded-lg w-full border-2 border-gray-300 p-4 dark:border-gray-700">
            <div class="mt-3 mb-4 rounded-lg grid w-full grid-cols-3 md:gap-4">
                <div class="p-4 rounded-lg flex justify-center bg-green-400 dark:bg-gray-800">
                    <p class="text-center text-xl font-semibold text-white dark:text-gray-50">
                        Dokumen Diterima Hari Ini
                        <span class=" block text-5xl text-center text-gray-50 dark:text-gray-500">
                            {{ $countDokumenTerimaToday }}
                        </span>
                    </p>
                </div>
                <div class="p-4 flex rounded-lg justify-center bg-blue-400 dark:bg-gray-50">
                    <p class="text-center text-xl font-semibold text-white dark:text-gray-500">
                        Dokumen Dipinjam Hari Ini
                        <span class="block text-5xl text-center text-gray-50 dark:text-gray-500">
                            {{ $countDokumenPinjamToday }}
                        </span>
                    </p>
                </div>
                <div class="p-4 flex rounded-lg justify-center bg-red-500 dark:bg-gray-50">
                    <p class="text-center text-xl font-semibold text-white dark:text-gray-500">
                        Dokumen Keluar Hari Ini
                        <span class="block text-center text-5xl text-gray-50 dark:text-gray-500">
                            {{ $countDokumenKeluarToday }}
                        </span>
                    </p>

                </div>
            </div>
        </div>
    </div>
@endsection
