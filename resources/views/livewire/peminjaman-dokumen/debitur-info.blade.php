<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
        <caption
            class="bg-slate-300 p-5 text-left text-lg font-semibold text-gray-900 rtl:text-right dark:bg-gray-800 dark:text-white">
            Hasil Pencarian "{{ $debitur->nama_debitur }}, {{ $debitur->no_debitur }}"
        </caption>
        <thead class="bg-slate-200 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3" scope="col">
                    Nama Debitur
                </th>
                <th class="px-6 py-3" scope="col">
                    Nomor Debitur
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
            </tr>
        </tbody>
    </table>
</div>
