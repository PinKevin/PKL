<div>
    <h2 class="text-4xl font-semibold text-gray-900 dark:text-gray-100">Detail Surat Roya</h2>

    <form class="ml-0.5 mt-4" wire:submit.prevent="storeSuratRoya" method="POST">
        <div class="mb-6 grid gap-6 md:grid-cols-2">
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="no_surat">
                    Nomor Surat
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="no_surat" type="text" value="{{ $suratRoya->no_surat }}" placeholder="Nomor surat" disabled>
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="tanggal_pelunasan">
                    Tanggal Pelunasan
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="tanggal_pelunasan" type="date" value="{{ $suratRoya->tanggal_pelunasan->format('Y-m-d') }}"
                    disabled>
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="kota_bpn">
                    Kota BPN
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="kota_bpn" type="text" value="{{ $suratRoya->kota_bpn }}" disabled>
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="lokasi_kepala_bpn">
                    Lokasi Kepala BPN
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="lokasi_kepala_bpn" type="text" value="{{ $suratRoya->lokasi_kepala_bpn }}" disabled>
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="no_agunan">
                    Nomor Agunan
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="no_agunan" type="text" value="{{ $suratRoya->no_agunan }}" disabled>
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="no_surat_ukur">
                    Nomor Surat Ukur
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="no_surat_ukur" type="text" value="{{ $suratRoya->no_surat_ukur }}" disabled>
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="kelurahan">
                    Kelurahan
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="kelurahan" type="text" value="{{ $suratRoya->kelurahan }}" disabled>
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="kecamatan">
                    Kecamatan
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="kecamatan" type="text" value="{{ $suratRoya->kecamatan }}" disabled>
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="nib">
                    NIB
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="nib" type="text" value="{{ $suratRoya->nib }}" disabled>
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="luas">
                    Luas Bangunan
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="luas" type="text" value="{{ $suratRoya->luas }}" disabled>
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="pemilik">
                    Pemilik Bangunan
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="pemilik" type="text" value="{{ $suratRoya->pemilik }}" disabled>
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="peringkat_sht">
                    Peringkat SHT
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="peringkat_sht" type="number" value="{{ $suratRoya->peringkat_sht }}" disabled>
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="no_sht">
                    Nomor SHT
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="no_sht" type="text" value="{{ $suratRoya->no_sht }}" disabled>
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="tanggal_sht">
                    Tanggal SHT
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="tanggal_sht" type="date" value="{{ $suratRoya->tanggal_sht->format('Y-m-d') }}" disabled>
            </div>
        </div>
        {{-- <button
            class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto"
            type="submit">
            Tambah
        </button> --}}
        <a class="w-full rounded-lg bg-gray-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 sm:w-auto"
            type="submit" href="{{ route('surat-roya.index') }}">
            Kembali
        </a>
    </form>

</div>
