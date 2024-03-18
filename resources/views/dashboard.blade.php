@extends('layouts.content')

@section('page_title')
    Dashboard
@endsection

@section('link_bantuan')
    {{ route('bantuan.dashboard') }}
@endsection

@section('content')
    <div class="rounded-lg border-2 border-gray-300 bg-gray-50 p-3">
        <h2 class="ml-2 text-4xl font-semibold dark:text-white">Selamat datang,</h2>
        <h3 class="ml-2 mt-1 text-2xl dark:text-white">{{ auth()->user()->nama }}</h3>
        <h5 class="ml-2 text-lg dark:text-white">NIP. {{ auth()->user()->nip }}</h5>
    </div>

    <div class="relative mt-8 overflow-x-auto shadow-md sm:rounded-lg">
        <table class=" w-full text-left text-sm text-gray-700 rtl:text-right dark:text-gray-400">
            <caption
                class="rounded-t-lg border-2 border-gray-300 bg-slate-50 p-5 text-left text-lg font-semibold text-gray-900 rtl:text-right dark:bg-gray-800 dark:text-white">
                Dokumen Jatuh Tempo
            </caption>
            <thead
                class="bg-slate-200 border-b-2 border-gray-300 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3" scope="col">
                        Nomor Debitur
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Nama Debitur
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Staff Notaris
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Staff Cabang
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Dokumen
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($bastPeminjaman->isEmpty())
                    <tr class="border-b-2 text-center border-gray-300 bg-gray-50 dark:border-gray-700 dark:bg-gray-800">
                        <td class="px-6 py-4" colspan="5">"Tidak ada peminjaman jatuh tempo"</td>
                    </tr>
                @else
                    @foreach ($bastPeminjaman as $index => $bast)
                        @foreach ($bast->peminjaman as $peminjamanIndex => $peminjaman)
                            <tr class="border-b-2 border-gray-300 bg-gray-50 dark:border-gray-700 dark:bg-gray-800">
                                @if ($peminjamanIndex == 0)
                                    <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                        scope="row" rowspan="{{ count($bast->peminjaman) }}">
                                        {{ $bast->debitur()->first()->no_debitur }}
                                    </th>
                                    <td class="px-6 py-4" rowspan="{{ count($bast->peminjaman) }}">
                                        {{ $bast->debitur()->first()->nama_debitur }}
                                    </td>
                                    <td class="px-6 py-4" rowspan="{{ count($bast->peminjaman) }}">
                                        {{ $bast->peminjam()->first()->nama }}
                                    </td>
                                    <td class="px-6 py-4" rowspan="{{ count($bast->peminjaman) }}">
                                        {{ $bast->peminta()->first()->nama }}
                                    </td>
                                @endif
                                <td class="px-6 py-4">
                                    {{ $peminjaman->dokumen->jenis }}
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div class="mt-8 rounded-lg bg-gray-50">
        <div class="flex w-full items-center justify-center rounded-lg border-2 border-gray-300 p-4 dark:border-gray-700">
            <div
                class="mb-4 mt-3 flex flex-nowrap content-center items-center justify-center justify-items-center gap-6 rounded-lg md:gap-4">
                <div class="flex justify-center rounded-lg bg-blue-500 p-4 dark:bg-gray-800">
                    <p class="text-center text-xl font-semibold text-white dark:text-gray-50">
                        Dokumen Diterima Hari Ini
                        <span class="block text-center text-5xl text-gray-50 dark:text-gray-500">
                            {{ $countDokumenTerimaToday }}
                        </span>
                    </p>
                </div>
                <div class="flex justify-center rounded-lg bg-green-400 p-4 dark:bg-gray-50">
                    <p class="text-center text-xl font-semibold text-white dark:text-gray-500">
                        Dokumen Dipinjam Hari Ini
                        <span class="block text-center text-5xl text-gray-50 dark:text-gray-500">
                            {{ $countDokumenPinjamToday }}
                        </span>
                    </p>
                </div>
                <div class="flex justify-center rounded-lg bg-yellow-300 p-4 dark:bg-gray-50">
                    <p class="text-center text-xl font-semibold text-white dark:text-gray-50">
                        Dokumen Keluar Hari Ini
                        <span class="block text-center text-5xl text-gray-50 dark:text-gray-50">
                            {{ $countDokumenKeluarToday }}
                        </span>
                    </p>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="m-auto mt-10 rounded border-2 border-gray-300 bg-gray-50 p-6 shadow">
            {!! $chart->container() !!}
        </div>
    </div>

    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
@endsection
