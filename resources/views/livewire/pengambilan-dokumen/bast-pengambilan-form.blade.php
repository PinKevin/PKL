<div class="relative mt-4 overflow-x-auto bg-slate-100 shadow-lg sm:rounded-lg">
    <table class="bg-gray-100">
        <h1
            class="bg-slate-300 p-5 text-left text-xl font-semibold text-gray-900 rtl:text-right dark:bg-gray-800 dark:text-white">
            Pengisian Berita Acara Serah Terima Dokumen Pokok
        </h1>
        <form wire:submit.prevent="storeBastPengambilan">
            <div class="mb-6 me-4 ms-4 mt-3 grid gap-7 md:grid-cols-2">
                <div>
                    <label class="mb-2 ml-1 block text-sm font-medium text-gray-900 dark:text-white" for="nama_debitur">
                        Nama Debitur
                    </label>
                    <input
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        id="nama_debitur" name="nama_debitur" type="text" placeholder="Nama Debitur"
                        wire:model="nama_debitur" />
                    @error('nama_debitur')
                        <div class="mb-4 mt-1 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <div class="text-sm font-semibold">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                </div>

                <div>
                    <label class="mb-2 ml-1 block text-sm font-medium text-gray-900 dark:text-white" for="no_debitur">
                        Nomor Debitur
                    </label>
                    <input
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        id="no_debitur" name="no_debitur" type="text" maxlength="13" placeholder="Nomor Debitur"
                        wire:model="no_debitur" />
                    @error('no_debitur')
                        <div class="mb-4 mt-1 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <div class="text-sm font-semibold">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                </div>
                <div>
                    <label class="mb-2 ml-1 block text-sm font-medium text-gray-900 dark:text-white" for="no_ktp">
                        Nomor KTP Debitur
                    </label>
                    <input
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        id="no_ktp" name="no_ktp" type="text" maxlength="13" placeholder="Nomor Debitur"
                        wire:model="no_ktp" />
                    @error('no_ktp')
                        <div class="mb-4 mt-1 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <div class="text-sm font-semibold">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                </div>

                <div>
                    <label class="mb-2 ml-1 block text-sm font-medium text-gray-900 dark:text-white"
                        for="tanggal_pelunasan">Tanggal Pelunasan</label>
                    <input
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        id="tanggal_pelunasan" type="date" wire:model="tanggal_pelunasan">
                    @error('tanggal_pelunasan')
                        <div class="mb-4 mt-1 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <div class="text-sm font-semibold">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                </div>

                <div>
                    <label class="mb-2 ml-1 block text-sm font-medium text-gray-900 dark:text-white" for="blok">
                        Blok
                    </label>
                    <input
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        id="blok" name="blok" type="text" placeholder="Blok" wire:model="blok" />
                    @error('blok')
                        <div class="mb-4 mt-1 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <div class="text-sm font-semibold">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                </div>

                <div>
                    <label class="mb-2 ml-1 block text-sm font-medium text-gray-900 dark:text-white" for="no">
                        No
                    </label>
                    <input
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        id="no" name="no" type="number" placeholder="No" wire:model="no" />
                    @error('no')
                        <div class="mb-4 mt-1 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <div class="text-sm font-semibold">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                </div>

                <div>
                    <label class="mb-2 ml-1 block text-sm font-medium text-gray-900 dark:text-white" for="alamat_ktp">
                        Alamat KTP
                    </label>
                    <textarea
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        id="alamat_ktp" name="alamat_ktp" placeholder="Alamat KTP" wire:model="alamat_ktp"></textarea>
                    @error('alamat_ktp')
                        <div class="mb-4 mt-1 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <div class="text-sm font-semibold">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                </div>

                <div>
                    <label class="mb-2 ml-1 block text-sm font-medium text-gray-900 dark:text-white"
                        for="alamat_agunan">
                        Alamat Agunan
                    </label>
                    <textarea
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        id="alamat_agunan" name="alamat_agunan" placeholder="Alamat agunan" wire:model="alamat_agunan"></textarea>
                    @error('alamat_agunan')
                        <div class="mb-4 mt-1 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <div class="text-sm font-semibold">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                </div>

                <div>
                    <label class="mb-2 ml-1 block text-sm font-medium text-gray-900 dark:text-white"
                        for="nama_developer">
                        Nama Developer
                    </label>
                    <select
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        id="nama_developer" name="nama_developer" wire:model="nama_developer">
                        <option value="" selected>Pilih developer</option>
                        @foreach ($developerList as $developer)
                            <option value="{{ $developer->kode_developer }}">{{ $developer->nama_developer }}
                            </option>
                        @endforeach
                    </select>
                    @error('nama_developer')
                        <div class="mb-4 mt-1 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <div class="text-sm font-semibold">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                </div>

                <div>
                    <label class="mb-2 ml-1 block text-sm font-medium text-gray-900 dark:text-white" for="pengambil">
                        Pengambil
                    </label>
                    <select
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        id="pengambil" name="pengambil" wire:model.change.live="pengambil">
                        <option value="" selected>Pilih pengambil</option>
                        <option value="Debitur">Debitur</option>
                        <option value="Ahli Waris">Ahli Waris</option>
                        <option value="Kuasa">Kuasa</option>
                    </select>
                    @error('pengambil')
                        <div class="mb-4 mt-1 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <div class="text-sm font-semibold">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                </div>

                <div>
                    <label class="mb-2 ml-1 block text-sm font-medium text-gray-900 dark:text-white"
                        for="nama_pengambil">
                        Nama Pengambil
                    </label>
                    <textarea
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        id="nama_pengambil" name="nama_pengambil" placeholder="Nama Pengambil" wire:model="nama_pengambil"></textarea>
                    @error('nama_pengambil')
                        <div class="mb-4 mt-1 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <div class="text-sm font-semibold">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                </div>

                <div>
                    <label class="mb-2 ml-1 block text-sm font-medium text-gray-900 dark:text-white"
                        for="no_ktp_pengambil">
                        Nomor KTP Pengambil
                    </label>
                    <textarea
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        id="no_ktp_pengambil" name="no_ktp_pengambil" placeholder="Nomor KTP pengambil" wire:model="no_ktp_pengambil"></textarea>
                    @error('no_ktp_pengambil')
                        <div class="mb-4 mt-1 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <div class="text-sm font-semibold">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                </div>

                <div>
                    <label class="mb-2 ml-1 block text-sm font-medium text-gray-900 dark:text-white"
                        for="file_pelunasan">
                        File Pelunasan
                    </label>
                    <input
                        class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
                        id="file_pelunasan" name="file_pelunasan" type="file" wire:model="file_pelunasan" />
                    @error('file_pelunasan')
                        <div class="mb-4 mt-1 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <div class="text-sm font-semibold">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                </div>
            </div>
            <button
                class="mb-5 ms-4 w-full rounded-lg bg-blue-700 px-8 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto"
                type="submit">Submit</button>
        </form>
    </table>
</div>
