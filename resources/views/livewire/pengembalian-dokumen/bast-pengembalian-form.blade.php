<div class="relative mt-4 overflow-x-auto bg-slate-100 shadow-lg sm:rounded-lg">
    <table class="bg-gray-100">
        <h1
            class="bg-slate-300 p-5 text-left text-xl font-semibold text-gray-900 rtl:text-right dark:bg-gray-800 dark:text-white">
            Pengisian Berita Acara Serah Terima Dokumen Pokok untuk Pengembalian
        </h1>
        <form wire:submit.prevent="storePengembalian">
            <div class="mb-6 me-4 ms-4 mt-3 grid gap-7 md:grid-cols-2">
                <div>
                    <label class="mb-2 ml-1 block text-sm font-medium text-gray-900 dark:text-white" for="notaris_id">
                        Nama Notaris</label>
                    <select
                        class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        id="notaris_id" name="notaris_id" disabled wire:model.change="notaris_id">
                        <option value="">Pilih notaris</option>
                        @foreach ($notaris as $n)
                            <option value="{{ $n->id }}">{{ $n->kode_notaris }} - {{ $n->nama_notaris }}
                            </option>
                        @endforeach
                    </select>
                    @error('notaris_id')
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
                    <label class="mb-2 ml-1 block text-sm font-medium text-gray-900 dark:text-white" for="peminjam">
                        Staff Notaris</label>
                    <select
                        class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        id="peminjam" name="peminjam" disabled wire:model="peminjam">
                        <option value="">Pilih Staff Notaris</option>
                        @foreach ($peminjamList as $p)
                            <option value="{{ $p->id }}" @if ($peminjam === $p->id) selected @endif>
                                {{ $p->nama }}</option>
                        @endforeach
                    </select>
                    @error('peminjam')
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
                        for="pendukung">Dokumen
                        Pendukung</label>
                    <textarea
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        id="pendukung" name="pendukung" placeholder="Dokumen penunjuk" wire:model="pendukung"></textarea>
                    @error('pendukung')
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
                        for="keperluan">Keperluan</label>
                    <textarea
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        id="keperluan" name="keperluan" placeholder="Keperluan peminjaman" wire:model="keperluan"></textarea>
                    @error('keperluan')
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
                        for="tanggal_kembali">Tanggal Kembali</label>
                    <input
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        id="tanggal_kembali" type="date" wire:model="tanggal_kembali">
                    @error('tanggal_kembali')
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
