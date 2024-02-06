<div>
    @if (session('storeSuccess'))
        <div class="mb-4 flex items-center rounded-lg border-t-4 border-green-300 bg-green-100 p-4 text-green-800 dark:border-green-800 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg class="h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {!! session('storeSuccess') !!}
            </div>
        </div>
    @endif
    @if (session('notAllChecked'))
        <div class="mb-4 flex items-center rounded-lg bg-red-50 p-4 text-red-800 dark:bg-gray-800 dark:text-red-400"
            id="alert-danger" role="alert">
            <svg class="h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('deleteError') }}
            </div>
        </div>
    @endif

    @include('livewire.pengambilan-dokumen.debitur-info')

    {{-- <div class="mt-4 bg-slate-100 shadow-lg sm:rounded-lg" id="accordion-color" data-accordion="collapse"
        data-active-classes="bg-slate-200 mt-4 dark:bg-gray-800 text-blue-600 dark:text-white">
        <h2 id="accordion-color-heading-1">
            <button
                class="flex w-full items-center justify-between gap-3 rounded-t-xl border border-b-0 border-slate-200 p-5 font-medium text-gray-800 hover:bg-slate-200 focus:ring-4 focus:ring-slate-300 rtl:text-right dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 dark:focus:ring-blue-100"
                data-accordion-target="#accordion-color-body-1" type="button" aria-expanded="false"
                aria-controls="accordion-color-body-1">
                <span>Riwayat Peminjaman</span>
                <svg class="h-3 w-3 shrink-0 rotate-180" data-accordion-icon aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5 5 1 1 5" />
                </svg>
            </button>
        </h2>
        <div class="hidden" id="accordion-color-body-1" aria-labelledby="accordion-color-heading-1">
            <div class="border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                <div class="relative space-y-4 overflow-x-auto bg-slate-100 p-4 shadow-md md:p-5"
                    style="max-height: 400px; overflow-y: auto;">
                    <table
                        class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400 sm:rounded-lg">
                        <thead class="bg-gray-300 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3" scope="col">
                                    No
                                </th>
                                <th class="px-4 py-4" scope="col">
                                    <button class="flex items-center uppercase" wire:click="sortResult('nama_notaris')">
                                        Dokumen yang Diambil
                                        <svg class="ms-1.5 h-3 w-3" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                        </svg>
                                    </button>
                                </th>
                                <th class="px-4 py-4" scope="col">
                                    <button class="flex items-center uppercase" wire:click="sortResult('nama_notaris')">
                                        Download BAST
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($logBast)
                                @foreach ($logBast as $log)
                                    <tr
                                        class="border-b-2 bg-white odd:bg-gray-100 even:bg-gray-50 hover:bg-slate-100 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                                        <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                            scope="row">
                                            {{ $loop->iteration }}
                                        </th>

                                        <td class="px-14 py-4">
                                            <ul
                                                class="max-w-md list-inside list-disc space-y-1 text-gray-500 dark:text-gray-400">
                                                @foreach ($jenisList[$log->id] as $jenis)
                                                    <li>{{ $jenis }}</li>
                                                @endforeach
                                            </ul>
                                        </td>

                                        <td class="px-4 py-4">
                                            <div class="text-center">
                                                <button
                                                    class="flex rounded-lg bg-blue-700 px-5 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <a class="flex items-center"
                                                        href="{{ route('pengambilan.cetak', ['id' => $log->id]) }}">
                                                        Cetak BAST
                                                    </a>
                                                </button>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <tr
                                    class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4 text-center" colspan="5">
                                        Tidak ada data!
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}

    @include('livewire.pengambilan-dokumen.show-dokumen')

    @error('checkedDokumen')
        <div class="mb-4 mt-2 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div class="text-sm font-semibold">
                {{ $message }}
            </div>
        </div>
    @enderror

    @if ($bastPengambilan)
        @include('livewire.pengambilan-dokumen.signed-bast-form')
    @else
        @include('livewire.pengambilan-dokumen.surat-roya-form')
        @include('livewire.pengambilan-dokumen.bast-pengambilan-form')
    @endif

    <a class="mt-4 inline-flex w-full items-center rounded-lg bg-gray-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 sm:w-auto"
        href="{{ route('peminjaman.index') }}">
        <svg class="mr-2 h-4 w-4 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 16 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 7 1 4l3-3m0 12h6.5a4.5 4.5 0 1 0 0-9H2" />
        </svg>
        Kembali
    </a>
</div>
