<div>
    @include('livewire.peminjaman-dokumen.debitur-info')

    @include('livewire.rekap-dokumen.show-dokumen')

    <a class="mt-4 inline-flex w-full items-center rounded-lg bg-gray-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 sm:w-auto"
        href="{{ route('rekap-dokumen.index') }}">
        <svg class="mr-2 h-4 w-4 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 16 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 7 1 4l3-3m0 12h6.5a4.5 4.5 0 1 0 0-9H2" />
        </svg>
        Kembali
    </a>
</div>
