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

    <div>
        <div class="mt-10 rounded-md bg-slate-100 dark:border-gray-700">
            <div class="p-4 border-2 border-gray-300 rounded-lg dark:border-gray-700">
                <div class="w-full grid grid-cols-3 gap-4 mb-4">
                    <div class="flex justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                        <p class="text-xl text-gray-700 dark:text-gray-500">
                            Dokumen Dipinjam Hari Ini
                        </p>
                    </div>
                    <div class="flex justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                        <p class="text-xl text-gray-700 dark:text-gray-500">
                            Dokumen Diambil Hari Ini
                        </p>
                    </div>
                    <div class="flex justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                        <p class="text-xl text-gray-700 dark:text-gray-500">
                            Dokumen Keluar Hari Ini
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
