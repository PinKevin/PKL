@extends('layouts.bantuan')

@section('page_title')
    Bantuan Report
@endsection

@section('content')
    <h2 class="mb-5 text-4xl font-semibold text-gray-900 dark:text-gray-100">Halaman Report!</h2>
    <p class="mb-3 text-justify text-base">Ini adalah halaman yang digunakan untuk mencetak report yang diinginkan. Report
        dapat berupa
        <span class="font-bold">stock opname, peminjaman, dan pengambilan</span>
    </p>
    <p class="mb-3 text-justify text-base">
        Pada halaman ini akan ditampilkan tabel dengan isi nomor debitur, nama debitur, jenis dokumen, serta tanggal
        diterima/dipinjam/diambil.
    </p>
    <p class="text-justify text-base">
        Hal-hal yang dapat dilakukan:
    </p>
    <ol class="max-w-full list-inside list-decimal space-y-1 text-base dark:text-gray-400">
        <li>
            Gunakan fitur pencarian untuk mencari informasi report debitur berdasarkan nama atau nomor debitur.
        </li>
        <li>
            Cetak laporan pada tombol <span class="font-bold">Print Report</span>.
        </li>
    </ol>
@endsection
