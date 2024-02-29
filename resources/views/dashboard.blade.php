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

    <div class="mt-8 rounded-lg bg-white">
        <div class="flex w-full items-center rounded-lg border-2 border-gray-300 p-4 dark:border-gray-700">
            <div class="mb-4 mt-3 grid w-full grid-cols-3 rounded-lg md:gap-4">
                <div class="flex justify-center rounded-lg bg-green-400 p-4 dark:bg-gray-800">
                    <p class="text-center text-xl font-semibold text-white dark:text-gray-50">
                        Dokumen Diterima Hari Ini
                        <span class="block text-center text-5xl text-gray-50 dark:text-gray-500">
                            {{ $countDokumenTerimaToday }}
                        </span>
                    </p>
                </div>
                <div class="flex justify-center rounded-lg bg-blue-400 p-4 dark:bg-gray-50">
                    <p class="text-center text-xl font-semibold text-white dark:text-gray-500">
                        Dokumen Dipinjam Hari Ini
                        <span class="block text-center text-5xl text-gray-50 dark:text-gray-500">
                            {{ $countDokumenPinjamToday }}
                        </span>
                    </p>
                </div>
                <div class="flex justify-center rounded-lg bg-red-500 p-4 dark:bg-gray-50">
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

    <div class="container mx-auto px-4">
        <div class="m-20 rounded bg-white p-6 shadow">
            {!! $chart->container() !!}
        </div>
    </div>

    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
@endsection
