@extends('layouts.bantuan')

@section('page_title')
    Bantuan Penerimaan
@endsection

@section('content')
    <h2 class="mb-5 text-4xl font-semibold text-gray-900 dark:text-gray-100">Halaman Penerimaan!</h2>
    <p class="mb-3 text-base">Ini adalah halaman yang digunakan untuk mendata penerimaan dokumen seorang debitur. </p>
    <p class="text-base">
        Cara menggunakan halaman penerimaan:
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
            Jika dokumen berstatus <span class="font-bold">Belum Tersedia</span>, maka akan terdapat tombol untuk menambah
            dokumen, dengan menu:
            <ul class="mt-2 list-inside list-disc space-y-1 ps-5">
                <li><span class="font-bold">Nomor Dokumen</span> : Nomor dokumen yang sesuai dengan jenisnya.</li>
                <li><span class="font-bold">Jenis</span> : Jenis dokumen yang terisi secara otomatis.</li>
                <li><span class="font-bold">Tanggal Terima</span> : Tanggal dokumen diterima oleh Anda.</li>
                <li><span class="font-bold">Tanggal Terbit</span> : Tanggal terbit dokumen.</li>
                <li><span class="font-bold">Tanggal Jatuh tempo</span> : Tanggal jatuh tempo dokumen.</li>
                <li><span class="font-bold">File</span> : File <span class="italic">scan</span> dokumen dalam format <span
                        class="font-bold">PDF</span>.
                </li>
            </ul>
        </li>
        <li>
            Akses detail ke informasi debitur dan dokumen terkait melalui opsi:
            <ul class="mt-2 list-inside list-disc space-y-1 ps-5">
                <li>
                    <div class="inline-flex">
                        <span class="font-bold">Show</span>
                        <svg class="ml-2 mt-1 h-[16px] w-[16px] text-yellow-300 hover:text-gray-900 dark:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                    </div>
                    : Tinjau dokumen
                </li>
                <li>
                    <div class="inline-flex">
                        <span class="font-bold">Edit</span>
                        <svg class="ml-2 mt-1 h-[16px] w-[16px] text-blue-600 hover:text-blue-900 dark:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path
                                d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                            <path
                                d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                        </svg>
                    </div>
                    : Ubah informasi dokumen yang sudah ada dan/atau mengubah file
                </li>
                <li>
                    <div class="inline-flex">
                        <span class="font-bold">Delete</span>
                        <svg class="ml-1 mt-1 h-[16px] w-[16px] text-red-600 hover:text-red-900 dark:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path
                                d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                        </svg>
                    </div>
                    : Hapus dokumen dari sistem.
                </li>
            </ul>
        </li>
    </ol>
@endsection
