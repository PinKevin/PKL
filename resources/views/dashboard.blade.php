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
            <div class="rounded-lg border-2 border-gray-300 p-4 dark:border-gray-700">
                <div class="mb-4 grid w-full grid-cols-3 gap-4">
                    <div class="flex h-24 justify-center rounded bg-gray-50 dark:bg-gray-800">
                        <p class="text-xl text-gray-700 dark:text-gray-500">
                            Dokumen Dipinjam Hari Ini
                        </p>
                        <p class="text-lg text-gray-800 dark:text-gray-500">
                            {{ $countDokumenTerimaToday }}
                        </p>
                    </div>
                    <div class="flex h-24 justify-center rounded bg-gray-50 dark:bg-gray-800">
                        <p class="text-xl text-gray-700 dark:text-gray-500">
                            Dokumen Diambil Hari Ini
                        </p>
                        <p class="text-lg text-gray-800 dark:text-gray-500">
                            {{ $countDokumenPinjamToday }}
                        </p>
                    </div>
                    <div class="flex h-24 justify-center rounded bg-gray-50 dark:bg-gray-800">
                        <p class="text-xl text-gray-700 dark:text-gray-500">
                            Dokumen Keluar Hari Ini
                        </p>
                        <p class="text-lg text-gray-800 dark:text-gray-500">
                            {{ $countDokumenKeluarToday }}
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
    </div>
@endsection
