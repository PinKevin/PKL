@extends('layouts.bantuan')

@section('page_title')
    Bantuan
@endsection

@section('content')
    <h2 class="mb-5 text-4xl font-semibold text-gray-900 dark:text-gray-100">Selamat datang di Fitur Bantuan!</h2>
    <p class="mb-3 text-base">Ini adalah tempat untuk mencari bantuan jika Anda mengalami kesulitan pada pengoperasian
        aplikasi.
        Di sini, Anda dapat menemukan panduan yang jelas agar Anda dapat mengoperasikan situs web ini tanpa masalah.
    </p>
    <p class="text-base">
        Berikut adalah beberapa bantuan utama yang dapat Anda gunakan:
    </p>
    <ol class="mt-1 max-w-full list-inside list-decimal space-y-1 text-base dark:text-gray-400">
        <li>
            <a class="text-blue-600 hover:underline dark:text-blue-500" href="{{ route('bantuan.dashboard') }}">Halaman
                Dashboard</a>
        </li>
        <li>
            <a class="text-blue-600 hover:underline dark:text-blue-500" href="{{ route('bantuan.data') }}">Pengelolaan data
                Debitur, Developer, Notaris, Staff Notaris, dan Staff
                Cabang</a>
        </li>
        <li>
            Pengelolaan Transaksi Dokumen, yang meliputi:
            <ul class="mt-2 list-inside list-disc space-y-1 ps-5">
                <li><a class="text-blue-600 hover:underline" href="{{ route('bantuan.penerimaan') }}">Penerimaan</a></li>
                <li><a class="text-blue-600 hover:underline" href="{{ route('bantuan.peminjaman') }}">Peminjaman</a></li>
                <li><a class="text-blue-600 hover:underline" href="{{ route('bantuan.pengembalian') }}">Pengembalian</a>
                </li>
                <li><a class="text-blue-600 hover:underline" href="{{ route('bantuan.pengambilan') }}">Pengambilan</a></li>
            </ul>
        </li>
        <li>
            Report untuk:
            <ul class="mt-2 list-inside list-disc space-y-1 ps-5">
                <li><a class="text-blue-600 hover:underline" href="{{ route('bantuan.report') }}">Stock Opname</a></li>
                <li><a class="text-blue-600 hover:underline" href="{{ route('bantuan.report') }}">Dokumen Sedang
                        Dipinjam</a></li>
                <li><a class="text-blue-600 hover:underline" href="{{ route('bantuan.report') }}">Dokumen Sudah Diambil</a>
                </li>
            </ul>
        </li>
    </ol>
@endsection
