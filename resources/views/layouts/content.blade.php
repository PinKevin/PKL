@extends('layouts.main')

@section('body')
    <nav class="fixed top-0 z-50 w-full border-b border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
        <div class="bg-gray-50 px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <button
                        class="inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-400 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 sm:hidden"
                        data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" type="button"
                        aria-controls="logo-sidebar">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a class="center ms-2 flex items-center md:me-24" href="">
                        <img class="me-3 h-9 items-center" src="/img/logo.png" alt="btn-logo" />
                    </a>
                </div>
                <div class="flex items-center">
                    <a class="ms-60" href="{{ route('bantuan') }}">
                        <svg class="h-7 w-7 text-slate-500 hover:text-slate-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm9-3a1.5 1.5 0 0 1 2.5 1.1 1.4 1.4 0 0 1-1.5 1.5 1 1 0 0 0-1 1V14a1 1 0 1 0 2 0v-.5a3.4 3.4 0 0 0 2.5-3.3 3.5 3.5 0 0 0-7-.3 1 1 0 0 0 2 .1c0-.4.2-.7.5-1Zm1 7a1 1 0 1 0 0 2 1 1 0 1 0 0-2Z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <div class="flex items-center">
                        <div class="ms-3 flex items-center">
                            <div>
                                <button
                                    class="flex rounded-full bg-gray-800 text-sm focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                    data-dropdown-toggle="dropdown-user" type="button" aria-expanded="false">
                                    <span class="sr-only">Open user menu</span>
                                    <div
                                        class="relative h-10 w-10 overflow-hidden rounded-full bg-gray-100 dark:bg-gray-600">
                                        <svg class="absolute -left-1 h-12 w-12 text-gray-400" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd">
                                            </path>
                                        </svg>
                                    </div>
                                </button>
                            </div>
                            <div class="z-50 my-4 hidden list-none divide-y divide-gray-100 rounded bg-white text-base shadow dark:divide-gray-600 dark:bg-gray-700"
                                id="dropdown-user">
                                <div class="px-4 py-3" role="none">
                                    <p class="text-sm text-gray-900 dark:text-white" role="none">
                                        {{ auth()->user()->nama }}
                                    </p>
                                    <p class="truncate text-sm font-medium text-gray-900 dark:text-gray-300" role="none">
                                        {{ auth()->user()->username }}
                                    </p>
                                </div>
                                <ul class="py-1" role="none">
                                    <li>
                                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                            href="{{ route('logout') }}" role="menuitem">
                                            Keluar
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </nav>

    <aside
        class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full border-r border-gray-200 bg-blue-500 pt-16 transition-transform dark:border-gray-700 dark:bg-gray-800 sm:translate-x-0"
        id="logo-sidebar" aria-label="Sidebar">
        <div class="h-full overflow-y-auto bg-blue-500 px-3 pb-4 dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a class="{{ request()->routeIs('dashboard') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group mt-5 flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                        href="{{ route('dashboard') }}">
                        <svg class="h-5 w-5 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
            </ul>

            @if (auth()->user()->roles->first()->permissions->contains('group', 'transaksi'))
                <ul class="mt-4 space-y-2 border-t border-white pt-4 font-medium dark:border-gray-700">

                    @can('penerimaan')
                        <li>
                            <a class="{{ request()->routeIs('penerimaan.*') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                                href="{{ route('penerimaan.index') }}">
                                <svg class="h-5 w-5 flex-shrink-0 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M9 7V2.2a2 2 0 0 0-.5.4l-4 3.9a2 2 0 0 0-.3.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-5h7.6l-.3.3a1 1 0 0 0 1.4 1.4l2-2c.4-.4.4-1 0-1.4l-2-2a1 1 0 0 0-1.4 1.4l.3.3H4V9h5a2 2 0 0 0 2-2Z"
                                        clip-rule="evenodd" />
                                </svg>

                                <span class="ms-3 flex-1 whitespace-nowrap">Penerimaan</span>
                            </a>
                        </li>
                    @endcan

                    @can('peminjaman')
                        <li>
                            <a class="{{ request()->routeIs('peminjaman.*') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                                href="{{ route('peminjaman.index') }}">
                                <svg class="h-5 w-5 flex-shrink-0 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                    viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9 7V2.22117C8.81709 2.31517 8.64812 2.43766 8.5 2.58579L4.58579 6.5C4.43766 6.64812 4.31517 6.81709 4.22117 7H9ZM11 7V2H18C19.1046 2 20 2.89543 20 4V13.2929C19.819 13.1119 19.569 13 19.2929 13H12.7071L13 12.7071C13.3905 12.3166 13.3905 11.6834 13 11.2929C12.6095 10.9024 11.9763 10.9024 11.5858 11.2929L9.58578 13.2929C9.19526 13.6834 9.19526 14.3166 9.58578 14.7071L11.5858 16.7071C11.9763 17.0976 12.6095 17.0976 13 16.7071C13.3905 16.3166 13.3905 15.6834 13 15.2929L12.7071 15H19.2929C19.569 15 19.819 14.8881 20 14.7071V20C20 21.1046 19.1046 22 18 22H6C4.89543 22 4 21.1046 4 20V9H9C10.1046 9 11 8.10457 11 7Z">
                                </svg>

                                <span class="ms-3 flex-1 whitespace-nowrap">Peminjaman</span>
                            </a>
                        </li>
                    @endcan

                    @can('pengembalian')
                        <li>
                            <a class="{{ request()->routeIs('pengembalian.*') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                                href="{{ route('pengembalian.index') }}">
                                <svg class="h-5 w-5 flex-shrink-0 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M9 7V2.2a2 2 0 0 0-.5.4l-4 3.9a2 2 0 0 0-.3.5H9Zm2 0V2h7a2 2 0 0 1 2 2v9.3l-2-2a1 1 0 0 0-1.4 1.4l.3.3h-6.6a1 1 0 1 0 0 2h6.6l-.3.3a1 1 0 0 0 1.4 1.4l2-2V20a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z"
                                        clip-rule="evenodd" />
                                </svg>

                                <span class="ms-3 flex-1 whitespace-nowrap">Pengembalian</span>
                            </a>
                        </li>
                    @endcan

                    @can('pengambilan')
                        <li>
                            <a class="{{ request()->routeIs('pengambilan.*') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                                href="{{ route('pengambilan.index') }}">
                                <svg class="h-5 w-5 flex-shrink-0 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M9 7V2.2a2 2 0 0 0-.5.4l-4 3.9a2 2 0 0 0-.3.5H9Zm2 0V2h7a2 2 0 0 1 2 2v9.3l-2-2a1 1 0 0 0-1.4 1.4l.3.3h-6.6a1 1 0 1 0 0 2h6.6l-.3.3a1 1 0 0 0 1.4 1.4l2-2V20a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z"
                                        clip-rule="evenodd" />
                                </svg>

                                <span class="ms-3 flex-1 whitespace-nowrap">Pengambilan</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            @endif

            @if (auth()->user()->roles->first()->permissions->contains('group', 'report'))
                <ul class="mt-4 space-y-2 border-t border-white pt-4 font-medium dark:border-gray-700">

                    @can('stock-opname')
                        <li>
                            <a class="{{ request()->routeIs('stock-opname.*') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                                href="{{ Route('stock-opname.index') }}">
                                <svg class="h-5 w-5 flex-shrink-0 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M8 3c0-.6.4-1 1-1h6c.6 0 1 .4 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-3 8c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2 1 1 0 1 0 0-2Zm2 5c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2 1 1 0 1 0 0-2Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ms-3 flex-1 whitespace-nowrap">Stock Opname</span>
                            </a>
                        </li>
                    @endcan

                    @can('report-peminjaman')
                        <li>
                            <a class="{{ request()->routeIs('report-peminjaman.*') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                                href="{{ Route('report-peminjaman.index') }}">
                                <svg class="h-5 w-5 flex-shrink-0 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M8 3c0-.6.4-1 1-1h6c.6 0 1 .4 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-3 8c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2 1 1 0 1 0 0-2Zm2 5c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2 1 1 0 1 0 0-2Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ms-3 flex-1 whitespace-nowrap">Report Peminjaman</span>
                            </a>
                        </li>
                    @endcan

                    @can('report-pengambilan')
                        <li>
                            <a class="{{ request()->routeIs('report-pengambilan.*') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                                href="{{ Route('report-pengambilan.index') }}">
                                <svg class="h-5 w-5 flex-shrink-0 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M8 3c0-.6.4-1 1-1h6c.6 0 1 .4 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-3 8c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2 1 1 0 1 0 0-2Zm2 5c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2 1 1 0 1 0 0-2Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ms-3 flex-1 whitespace-nowrap">Report Pengambilan</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            @endif

            @if (auth()->user()->roles->first()->permissions->contains('group', 'master-data'))
                <ul class="mt-4 space-y-2 border-t border-white pt-4 font-medium dark:border-gray-700">

                    @can('debitur')
                        <li>
                            <a class="{{ request()->routeIs('debitur.*') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                                href="{{ route('debitur.index') }}">
                                <svg class="h-5 w-5 flex-shrink-0 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                        clip-rule="evenodd" />
                                </svg>

                                <span class="ms-3 flex-1 whitespace-nowrap">Debitur</span>
                            </a>
                        </li>
                    @endcan

                    @can('notaris')
                        <li>
                            <a class="{{ request()->routeIs('notaris.*') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                                href="{{ Route('notaris.index') }}">
                                <svg class="h-5 w-5 flex-shrink-0 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 18">
                                    <path
                                        d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                                </svg>
                                <span class="ms-3 flex-1 whitespace-nowrap">Notaris</span>
                            </a>
                        </li>
                    @endcan

                    @can('developer')
                        <li>
                            <a class="{{ request()->routeIs('developer.*') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                                href="{{ Route('developer.index') }}">
                                <svg class="h-5 w-5 flex-shrink-0 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M17 10v1.1l1 .5.8-.8 1.4 1.4-.8.8.5 1H21v2h-1.1l-.5 1 .8.8-1.4 1.4-.8-.8a4 4 0 0 1-1 .5V20h-2v-1.1a4 4 0 0 1-1-.5l-.8.8-1.4-1.4.8-.8a4 4 0 0 1-.5-1H11v-2h1.1l.5-1-.8-.8 1.4-1.4.8.8a4 4 0 0 1 1-.5V10h2Zm.4 3.6c.4.4.6.8.6 1.4a2 2 0 0 1-3.4 1.4A2 2 0 0 1 16 13c.5 0 1 .2 1.4.6ZM5 8a4 4 0 1 1 8 .7 7 7 0 0 0-3.3 3.2A4 4 0 0 1 5 8Zm4.3 5H7a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h6.1a7 7 0 0 1-1.8-7Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ms-3 flex-1 whitespace-nowrap">Developer</span>
                            </a>
                        </li>
                    @endcan

                    @can('staff-notaris')
                        <li>
                            <a class="{{ request()->routeIs('staff-notaris.*') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                                href="{{ Route('staff-notaris.index') }}">
                                <svg class="h-5 w-5 flex-shrink-0 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4c0 1.1.9 2 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.8-3.1a5.5 5.5 0 0 0-2.8-6.3c.6-.4 1.3-.6 2-.6a3.5 3.5 0 0 1 .8 6.9Zm2.2 7.1h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1l-.5.8c1.9 1 3.1 3 3.1 5.2ZM4 7.5a3.5 3.5 0 0 1 5.5-2.9A5.5 5.5 0 0 0 6.7 11 3.5 3.5 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4c0 1.1.9 2 2 2h.5a6 6 0 0 1 3-5.2l-.4-.8Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ms-3 flex-1 whitespace-nowrap">Staff Notaris</span>
                            </a>
                        </li>
                    @endcan

                    @can('staff-cabang')
                        <li>
                            <a class="{{ request()->routeIs('staff-cabang.*') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                                href="{{ Route('staff-cabang.index') }}">
                                <svg class="h-5 w-5 flex-shrink-0 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 2a7 7 0 0 0-7 7 3 3 0 0 0-3 3v2a3 3 0 0 0 3 3h1c.6 0 1-.4 1-1V9a5 5 0 1 1 10 0v7a3 3 0 0 1-3 3 2 2 0 0 0-2-2h-1a2 2 0 0 0-2 2v1c0 1.1.9 2 2 2h1a2 2 0 0 0 1.7-1h.4a5 5 0 0 0 4.8-4h.1a3 3 0 0 0 3-3v-2a3 3 0 0 0-3-3 7 7 0 0 0-7-7Zm1.5 3.3a4 4 0 0 0-4.4 1 1 1 0 0 0 1.4 1.3 2 2 0 0 1 2.9 0A1 1 0 1 0 14.8 6a4 4 0 0 0-1.3-.8Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ms-3 flex-1 whitespace-nowrap">Staff Cabang</span>
                            </a>
                        </li>
                    @endcan

                    @can('kota')
                        <li>
                            <a class="{{ request()->routeIs('city.*') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                                href="{{ route('city.index') }}">
                                <svg class="h-5 w-5 flex-shrink-0 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M17 10v1.1l1 .5.8-.8 1.4 1.4-.8.8.5 1H21v2h-1.1l-.5 1 .8.8-1.4 1.4-.8-.8a4 4 0 0 1-1 .5V20h-2v-1.1a4 4 0 0 1-1-.5l-.8.8-1.4-1.4.8-.8a4 4 0 0 1-.5-1H11v-2h1.1l.5-1-.8-.8 1.4-1.4.8.8a4 4 0 0 1 1-.5V10h2Zm.4 3.6c.4.4.6.8.6 1.4a2 2 0 0 1-3.4 1.4A2 2 0 0 1 16 13c.5 0 1 .2 1.4.6ZM5 8a4 4 0 1 1 8 .7 7 7 0 0 0-3.3 3.2A4 4 0 0 1 5 8Zm4.3 5H7a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h6.1a7 7 0 0 1-1.8-7Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ms-3 flex-1 whitespace-nowrap">Kota</span>
                            </a>
                        </li>
                    @endcan

                    @can('kecamatan')
                        <li>
                            <a class="{{ request()->routeIs('district.*') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                                href="{{ route('district.index') }}">
                                <svg class="h-5 w-5 flex-shrink-0 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M17 10v1.1l1 .5.8-.8 1.4 1.4-.8.8.5 1H21v2h-1.1l-.5 1 .8.8-1.4 1.4-.8-.8a4 4 0 0 1-1 .5V20h-2v-1.1a4 4 0 0 1-1-.5l-.8.8-1.4-1.4.8-.8a4 4 0 0 1-.5-1H11v-2h1.1l.5-1-.8-.8 1.4-1.4.8.8a4 4 0 0 1 1-.5V10h2Zm.4 3.6c.4.4.6.8.6 1.4a2 2 0 0 1-3.4 1.4A2 2 0 0 1 16 13c.5 0 1 .2 1.4.6ZM5 8a4 4 0 1 1 8 .7 7 7 0 0 0-3.3 3.2A4 4 0 0 1 5 8Zm4.3 5H7a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h6.1a7 7 0 0 1-1.8-7Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ms-3 flex-1 whitespace-nowrap">Kecamatan</span>
                            </a>
                        </li>
                    @endcan

                    @can('kelurahan')
                        <li>
                            <a class="{{ request()->routeIs('village.*') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                                href="{{ route('village.index') }}">
                                <svg class="h-5 w-5 flex-shrink-0 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M17 10v1.1l1 .5.8-.8 1.4 1.4-.8.8.5 1H21v2h-1.1l-.5 1 .8.8-1.4 1.4-.8-.8a4 4 0 0 1-1 .5V20h-2v-1.1a4 4 0 0 1-1-.5l-.8.8-1.4-1.4.8-.8a4 4 0 0 1-.5-1H11v-2h1.1l.5-1-.8-.8 1.4-1.4.8.8a4 4 0 0 1 1-.5V10h2Zm.4 3.6c.4.4.6.8.6 1.4a2 2 0 0 1-3.4 1.4A2 2 0 0 1 16 13c.5 0 1 .2 1.4.6ZM5 8a4 4 0 1 1 8 .7 7 7 0 0 0-3.3 3.2A4 4 0 0 1 5 8Zm4.3 5H7a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h6.1a7 7 0 0 1-1.8-7Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ms-3 flex-1 whitespace-nowrap">Kelurahan</span>
                            </a>
                        </li>
                    @endcan

                </ul>
            @endif

            @if (auth()->user()->roles->first()->permissions->contains('group', 'akun'))
                <ul class="mt-4 space-y-2 border-t border-white pt-4 font-medium dark:border-gray-700">

                    @can('kelola-akun')
                        <li>
                            <a class="{{ request()->routeIs('akun') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                                href="{{ route('akun') }}">
                                <svg class="h-5 w-5 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M17 10v1.1l1 .5.8-.8 1.4 1.4-.8.8.5 1H21v2h-1.1l-.5 1 .8.8-1.4 1.4-.8-.8a4 4 0 0 1-1 .5V20h-2v-1.1a4 4 0 0 1-1-.5l-.8.8-1.4-1.4.8-.8a4 4 0 0 1-.5-1H11v-2h1.1l.5-1-.8-.8 1.4-1.4.8.8a4 4 0 0 1 1-.5V10h2Zm.4 3.6c.4.4.6.8.6 1.4a2 2 0 0 1-3.4 1.4A2 2 0 0 1 16 13c.5 0 1 .2 1.4.6ZM5 8a4 4 0 1 1 8 .7 7 7 0 0 0-3.3 3.2A4 4 0 0 1 5 8Zm4.3 5H7a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h6.1a7 7 0 0 1-1.8-7Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ms-3">Kelola Akun</span>
                            </a>
                        </li>
                    @endcan

                    @can('kelola-role')
                        <li>
                            <a class="{{ request()->routeIs('hak-akses.*') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                                href="{{ route('hak-akses.index') }}">
                                <svg class="h-5 w-5 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M17 10v1.1l1 .5.8-.8 1.4 1.4-.8.8.5 1H21v2h-1.1l-.5 1 .8.8-1.4 1.4-.8-.8a4 4 0 0 1-1 .5V20h-2v-1.1a4 4 0 0 1-1-.5l-.8.8-1.4-1.4.8-.8a4 4 0 0 1-.5-1H11v-2h1.1l.5-1-.8-.8 1.4-1.4.8.8a4 4 0 0 1 1-.5V10h2Zm.4 3.6c.4.4.6.8.6 1.4a2 2 0 0 1-3.4 1.4A2 2 0 0 1 16 13c.5 0 1 .2 1.4.6ZM5 8a4 4 0 1 1 8 .7 7 7 0 0 0-3.3 3.2A4 4 0 0 1 5 8Zm4.3 5H7a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h6.1a7 7 0 0 1-1.8-7Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ms-3">Kelola Role</span>
                            </a>
                        </li>
                    @endcan

                    @can('kelola-izin')
                        <li>
                            <a class="{{ request()->routeIs('izin.*') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                                href="{{ route('izin.index') }}">
                                <svg class="h-5 w-5 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M17 10v1.1l1 .5.8-.8 1.4 1.4-.8.8.5 1H21v2h-1.1l-.5 1 .8.8-1.4 1.4-.8-.8a4 4 0 0 1-1 .5V20h-2v-1.1a4 4 0 0 1-1-.5l-.8.8-1.4-1.4.8-.8a4 4 0 0 1-.5-1H11v-2h1.1l.5-1-.8-.8 1.4-1.4.8.8a4 4 0 0 1 1-.5V10h2Zm.4 3.6c.4.4.6.8.6 1.4a2 2 0 0 1-3.4 1.4A2 2 0 0 1 16 13c.5 0 1 .2 1.4.6ZM5 8a4 4 0 1 1 8 .7 7 7 0 0 0-3.3 3.2A4 4 0 0 1 5 8Zm4.3 5H7a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h6.1a7 7 0 0 1-1.8-7Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ms-3">Kelola Izin</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            @endif

        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="border-gray-700">
            <div class="mt-14 rounded-md bg-slate-100 p-5 dark:border-gray-700">
                @yield('content')
            </div>
        </div>
    </div>
@endsection
