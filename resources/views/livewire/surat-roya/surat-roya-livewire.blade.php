<div>
    <h2 class="text-4xl font-semibold text-gray-900 dark:text-gray-100">Buat Surat Roya</h2>

    <form class="ml-0.5 mt-4" wire:submit.prevent="generateSuratRoya" method="POST">
        {{-- <div class="mb-6 grid gap-6 md:grid-cols-2">
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="first_name">First
                    name</label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="first_name" type="text" placeholder="John" required>
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="last_name">Last
                    name</label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="last_name" type="text" placeholder="Doe" required>
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                    for="company">Company</label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="company" type="text" placeholder="Flowbite" required>
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="phone">Phone
                    number</label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="phone" type="tel" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"
                    required>
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="website">Website
                    URL</label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="website" type="url" placeholder="flowbite.com" required>
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="visitors">Unique
                    visitors (per month)</label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="visitors" type="number" placeholder="" required>
            </div>
        </div> --}}
        <div class="mb-6">
            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="nama">
                Nama
            </label>
            <input
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                id="nama" name="nama" type="text" wire:model="nama" placeholder="Nama">
            @error('nama')
                <div class="mb-4 mt-1 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
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
        </div>
        <div class="mb-6">
            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="no_hp">Nomor HP</label>
            <input
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                id="no_hp" type="text" placeholder="Nomor HP" wire:model="no_hp">
            @error('no_hp')
                <div class="mb-4 mt-1 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
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
        </div>
        <button
            class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto"
            type="submit">Submit</button>
    </form>

    @if ($pdfUrl)
        <p><a href="{{ $pdfUrl }}" target="_blank" download>Download PDF</a></p>
    @endif
</div>
