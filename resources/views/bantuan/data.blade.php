@extends('layouts.bantuan')

@section('page_title')
    Bantuan Data
@endsection

@section('content')
    <h2 class="mb-5 text-4xl font-semibold text-gray-900 dark:text-gray-100">Halaman Data!</h2>
    <p class="mb-3 text-base">Ini adalah halaman yang digunakan untuk mendata master data, seperti debitur, developer,
        notaris, staff notaris, dan staff cabang. </p>
    <p class="text-base">
        Cara menggunakan halaman data:
    </p>
    <ol class="max-w-full list-inside list-decimal space-y-1 text-base dark:text-gray-400">
        <li>
            Gunakan tombol <span class="font-bold">Tambah</span> untuk melakukan penambahan data.
        </li>
        <li>
            Lakukan pencarian sebuah data dengan bilah pencarian di sebelah kiri tombol <span
                class="font-bold">Tambah</span>.
        </li>
        <li>
            Akses detail ke informasi data melalui opsi:
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
                    : Tinjau data.
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
                    : Ubah data.
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
                    : Hapus data.
                </li>
            </ul>
        </li>
    </ol>
@endsection
