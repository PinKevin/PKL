<div>
    <h2 class="text-4xl font-semibold text-gray-900 dark:text-gray-100">Daftar Debitur</h2>

    {{-- {!! $allDokumen !!} --}}
    <div class="relative overflow-x-auto shadow-lg sm:rounded-md">
        <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
            <thead class="bg-slate-300 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3" scope="col">
                        No
                    </th>
                    <th class="px-7 py-4" scope="col">
                        <button class="flex items-center uppercase" wire:click="sortResult('no_debitur')">
                            Nomor Debitur
                            <svg class="ms-1.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg>
                        </button>
                    </th>
                    <th class="px-7 py-4" scope="col">
                        <button class="flex items-center uppercase" wire:click="sortResult('nama_debitur')">
                            Nama Debitur
                            <svg class="ms-1.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg>
                        </button>
                    </th>
                    <th class="px-4 py-4" scope="col">
                        Dokumen
                    </th>
                    <th class="px-4 py-4" scope="col">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allDokumen as $dok)
                    <tr>
                        <td rowspan="11">{{ $loop->iteration }}</td>
                        <td rowspan="11">{{ $dok->first()->debitur->no_debitur }}</td>
                        <td rowspan="11">{{ $dok->first()->debitur->nama_debitur }}</td>
                    </tr>
                    @foreach (['PPJB', 'AJB', 'SKMHT', 'APHT', 'PH', 'SHT', 'IMB', 'Sertipikat', 'PK', 'CN'] as $jenis)
                        @php
                            $d = $dok->where('jenis', $jenis)->first();
                        @endphp
                        @if ($d)
                            <tr>
                                <td>
                                    {{ $jenis }}
                                </td>
                                <td>
                                    @if ($d->status_pinjaman == 0)
                                        Tersedia
                                    @elseif ($d->status_keluar == 1)
                                        Keluar
                                    @elseif ($d->status_pinjaman == 1)
                                        Dipinjam
                                    @endif
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td>{{ $jenis }}</td>
                                <td>Tidak Tersedia</td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- <div class="mt-4 items-center">
        {{ $allDokumen->links() }}
    </div> --}}
</div>
