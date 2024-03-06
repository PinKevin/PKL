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

    <div class="mt-8 relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm  text-left rtl:text-right text-gray-700 dark:text-gray-400">
            <caption
                class="p-5 border-gray-300 border-2 rounded-t-lg text-lg font-semibold text-left rtl:text-right text-gray-900 bg-gray-50 dark:text-white dark:bg-gray-800">
                Dokumen Jatuh Tempo
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-slate-200 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nomor Debitur
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Debitur
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Staff Notaris
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Staff Cabang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Dokumen
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-slate-100 border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        ---
                    </th>
                    <td class="px-6 py-4">
                        ---
                    </td>
                    <td class="px-6 py-4">
                        ---
                    </td>
                    <td class="px-6 py-4">
                        --
                    </td>
                    <td class="px-6 py-4">
                        --
                    </td>
                </tr>
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
