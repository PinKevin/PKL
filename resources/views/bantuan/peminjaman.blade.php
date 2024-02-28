@extends('layouts.bantuan')

@section('page_title')
    Bantuan Peminjaman
@endsection

@section('content')
    <h2 class="mb-5 text-4xl font-semibold text-gray-900 dark:text-gray-100">Halaman Peminjaman!</h2>
    <p class="mb-3 text-base">Ini adalah halaman yang digunakan untuk mendata peminjaman dokumen seorang debitur. </p>
    <p class="text-base">
        Cara menggunakan halaman peminjaman:
    </p>
    <ol class="max-w-full list-inside list-decimal space-y-1 text-base dark:text-gray-400">
        <li>
            Gunakan fitur pencarian untuk mencari informasi debitur berdasarkan nama atau nomor debitur.
        </li>
        <li>
            Hasil pencarian akan ditampilkan dalam tabel yang mencakup jenis dokumen seperti PPJB, AJB, SKMHT, APHT, dll.
        </li>
        <li>
            Kolom status pada tabel dilengkapi dengan <span class="italic">badge</span> untuk identifikasi
            ketersediaan dokumen dengan status sebagai berikut:
            <ul class="mt-2 list-inside list-disc space-y-1 ps-5">
                <li>
                    <span
                        class="me-2 inline-block rounded-full bg-green-200 px-7 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">
                        Tersedia
                    </span>:
                    Dokumen tersedia.
                </li>
                <li>
                    <span
                        class="me-1 inline-block rounded-full bg-yellow-200 px-7 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">
                        Dipinjam
                    </span>:
                    Dokumen sedang dipinjam.
                </li>
                <li>
                    <span
                        class="inline-block rounded-full bg-red-200 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:bg-red-900 dark:text-red-300">
                        Belum Tersedia
                    </span> :
                    Dokumen belum pernah diterima.
                </li>
                <li>
                    <span
                        class="me-2 rounded-full bg-gray-600 px-8 py-0.5 text-xs font-medium text-white dark:bg-indigo-900 dark:text-indigo-300">
                        Keluar
                    </span>:
                    Dokumen telah diambil.
                </li>
            </ul>
        </li>
        <li>
            Terdapat informasi penting pada tabel, seperti nomor dokumen, tanggal terima, tanggal terbit, dan tanggal jatuh
            tempo.
        </li>
        <li>
            Jika dokumen berstatus <span class="font-bold">Tersedia</span>, maka dokumen dapat dipinjam.
        </li>
        <li>
            Isi semua bagian yang terdapat pada bagian bawah tabel. Jika meminjam SHT, maka akan terdapat isian tambahan.
        </li>
        <li>
            Simpan peminjaman dengan menekan tombol <span class="font-bold">Submit</span>.
        </li>
        <li>
            Untuk melihat peminjaman-peminjaman yang dilakukan, tekan bagian
            <span class="font-bold">
                Riwayat Peminjaman
            </span>.
        </li>
    </ol>
@endsection
