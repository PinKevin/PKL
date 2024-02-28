@extends('layouts.bantuan')

@section('page_title')
    Bantuan
@endsection

@section('content')
    <h2 class="mb-5 text-4xl font-semibold text-gray-900 dark:text-gray-100">Selamat datang di Bantuan!</h2>
    <p class="mb-3 text-base">Ini adalah tempat untuk mencari bantuan jika Anda mengalami kesulitan pada pengoperasian
        aplikasi.
        Di sini, Anda dapat menemukan panduan yang jelas agar Anda dapat mengoperasikan situs web ini tanpa masalah.
    </p>
    <p class="text-base">
        Berikut adalah beberapa bantuan utama yang dapat Anda gunakan:
    </p>
    <ol class="mt-1 max-w-full list-inside list-decimal space-y-1 text-base dark:text-gray-400">
        <li>
            {{-- <span class="font-semibold text-gray-900 dark:text-white">Bonnie Green</span> with <span
                class="font-semibold text-gray-900 dark:text-white">70</span> points --}}
            <a class="text-blue-600 hover:underline dark:text-blue-500" href="{{ route('bantuan.dashboard') }}">Halaman
                Dashboard</a>
        </li>
        <li>
            Pengelolaan Data Debitur, Developer, Notaris, Staff Notaris, dan Staff Cabang
        </li>
        <li>
            Pengelolaan Transaksi Dokumen, yang meliputi:
            <ul class="mt-2 list-inside list-disc space-y-1 ps-5">
                <li>Penerimaan</li>
                <li>Peminjaman</li>
                <li>Pengembalian</li>
                <li>Pengambilan</li>
            </ul>
        </li>
        <li>
            Report untuk:
            <ul class="mt-2 list-inside list-disc space-y-1 ps-5">
                <li>Stock Opname</li>
                <li>Dokumen Sedang Dipinjam</li>
                <li>Dokumen Sudah Diambil</li>
            </ul>
        </li>
    </ol>
@endsection
