<div>
    <h2 class="text-4xl font-semibold text-gray-900 dark:text-gray-100">Detail Debitur</h2>
    <form class="ml-0.5 mt-4">
        <div class="mb-6 grid gap-6 md:grid-cols-2">
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="no_debitur">
                    Nomor Debitur
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="no_debitur" type="text" wire:model="no_debitur" disabled>
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="nama_debitur">
                    Nama Debitur
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="nama_debitur" type="text" wire:model="nama_debitur" disabled>
            </div>
        </div>
    </form>

    <h2 class="text-4xl font-semibold text-gray-900 dark:text-gray-100">Daftar Berkas</h2>
    @forelse ($dokumen as $dok)
        <div id="accordion-open" data-accordion="open">
            <h2 id="accordion-open-heading-1">
                <button
                    class="flex w-full items-center justify-between gap-3 rounded-t border border-b-0 border-gray-200 p-5 font-medium text-gray-500 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 rtl:text-right dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 dark:focus:ring-gray-800"
                    data-accordion-target="#accordion-open-body-1" type="button" aria-expanded="true"
                    aria-controls="accordion-open-body-1">
                    <span class="flex items-center"><svg class="me-2 h-5 w-5 shrink-0" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                clip-rule="evenodd"></path>
                        </svg> What is Flowbite?</span>
                    <svg class="h-3 w-3 shrink-0 rotate-180" data-accordion-icon aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div class="hidden" id="accordion-open-body-1" aria-labelledby="accordion-open-heading-1">
                <div class="border border-b-0 border-gray-200 p-5 dark:border-gray-700 dark:bg-gray-900">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an open-source library of interactive
                        components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.
                    </p>
                    <p class="text-gray-500 dark:text-gray-400">Check out this guide to learn how to <a
                            class="text-blue-600 hover:underline dark:text-blue-500"
                            href="/docs/getting-started/introduction/">get started</a> and start developing websites
                        even faster with components on top of Tailwind CSS.</p>
                </div>
            </div>
            <h2 id="accordion-open-heading-2">
                <button
                    class="flex w-full items-center justify-between gap-3 border border-b-0 border-gray-200 p-5 font-medium text-gray-500 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 rtl:text-right dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 dark:focus:ring-gray-800"
                    data-accordion-target="#accordion-open-body-2" type="button" aria-expanded="false"
                    aria-controls="accordion-open-body-2">
                    <span class="flex items-center"><svg class="me-2 h-5 w-5 shrink-0" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                clip-rule="evenodd"></path>
                        </svg>Is there a Figma file available?</span>
                    <svg class="h-3 w-3 shrink-0 rotate-180" data-accordion-icon aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div class="hidden" id="accordion-open-body-2" aria-labelledby="accordion-open-heading-2">
                <div class="border border-b-0 border-gray-200 p-5 dark:border-gray-700">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first conceptualized and designed using
                        the Figma software so everything you see in the library has a design equivalent in our Figma
                        file.</p>
                    <p class="text-gray-500 dark:text-gray-400">Check out the <a
                            class="text-blue-600 hover:underline dark:text-blue-500"
                            href="https://flowbite.com/figma/">Figma design system</a> based on the utility classes from
                        Tailwind CSS and components from Flowbite.</p>
                </div>
            </div>
            <h2 id="accordion-open-heading-3">
                <button
                    class="flex w-full items-center justify-between gap-3 border border-gray-200 p-5 font-medium text-gray-500 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 rtl:text-right dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 dark:focus:ring-gray-800"
                    data-accordion-target="#accordion-open-body-3" type="button" aria-expanded="false"
                    aria-controls="accordion-open-body-3">
                    <span class="flex items-center"><svg class="me-2 h-5 w-5 shrink-0" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                clip-rule="evenodd"></path>
                        </svg> What are the differences between Flowbite and Tailwind UI?</span>
                    <svg class="h-3 w-3 shrink-0 rotate-180" data-accordion-icon aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div class="hidden" id="accordion-open-body-3" aria-labelledby="accordion-open-heading-3">
                <div class="border border-t-0 border-gray-200 p-5 dark:border-gray-700">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">The main difference is that the core components
                        from Flowbite are open source under the MIT license, whereas Tailwind UI is a paid product.
                        Another difference is that Flowbite relies on smaller and standalone components, whereas
                        Tailwind UI offers sections of pages.</p>
                    <p class="mb-2 text-gray-500 dark:text-gray-400">However, we actually recommend using both
                        Flowbite, Flowbite Pro, and even Tailwind UI as there is no technical reason stopping you from
                        using the best of two worlds.</p>
                    <p class="mb-2 text-gray-500 dark:text-gray-400">Learn more about these technologies:</p>
                    <ul class="list-disc ps-5 text-gray-500 dark:text-gray-400">
                        <li><a class="text-blue-600 hover:underline dark:text-blue-500"
                                href="https://flowbite.com/pro/">Flowbite Pro</a></li>
                        <li><a class="text-blue-600 hover:underline dark:text-blue-500" href="https://tailwindui.com/"
                                rel="nofollow">Tailwind UI</a></li>
                    </ul>
                </div>
            </div>
        </div>
    @empty
        <h2 class="text-center text-lg font-semibold text-gray-900 dark:text-gray-100">Data tidak tersedia!</h2>
    @endforelse
</div>
