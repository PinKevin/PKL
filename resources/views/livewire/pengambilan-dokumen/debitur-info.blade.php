<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
        <caption
            class="bg-slate-300 p-5 text-left text-lg font-semibold text-gray-900 rtl:text-right dark:bg-gray-800 dark:text-white">
            Hasil Pencarian . . .
        </caption>
        <thead class="bg-slate-200 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3" scope="col">
                    Nama Debitur
                </th>
                <th class="px-6 py-3" scope="col">
                    Nomor Debitur
                </th>
                <th class="px-6 py-3" scope="col">
                    Status Pelunasan
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b-2 bg-white odd:bg-gray-100 even:bg-gray-50 dark:border-gray-700 dark:bg-gray-800">
                <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white" scope="row">
                    {{ $debitur->nama_debitur }}
                </th>
                <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                    {{ $debitur->no_debitur }}
                </td>
                <td class="whitespace-nowrap px-8 py-4 font-medium text-gray-900 dark:text-white">
                    @if ($debitur->sudah_lunas)
                        <span
                            class="me-2 rounded-full bg-green-200 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">Sudah
                            Lunas</span>
                    @else
                        <span
                            class="me-2 rounded-full bg-red-200 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:bg-red-900 dark:text-red-300">Belum
                            Lunas</span>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>
