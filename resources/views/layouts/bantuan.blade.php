@extends('layouts.main')

@section('body')
    <nav class="fixed top-0 z-50 w-full border-b border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
        <div class="bg-gray-50 px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a class="p-1 flex items-center rounded-lg px-2 font-semibold hover:bg-slate-200"
                        href="{{ route('dashboard') }}">
                        Kembali ke halaman utama
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="ms-3 flex items-center">
                        <div>
                            <button
                                class="flex rounded-full bg-gray-800 text-sm focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                data-dropdown-toggle="dropdown-user" type="button" aria-expanded="false">
                                <span class="sr-only">Open user menu</span>
                                <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                    <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd">
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
    </nav>

    <aside
        class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full border-r border-gray-200 bg-blue-500 pt-20 transition-transform dark:border-gray-700 dark:bg-gray-800 sm:translate-x-0"
        id="logo-sidebar" aria-label="Sidebar">
        <div class="h-full overflow-y-auto bg-blue-500 px-3 pb-4 dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <span
                        class="group flex items-center rounded-lg pl-2 text-lg font-bold uppercase text-slate-300 dark:text-white dark:hover:bg-gray-700">
                        Memulai
                    </span>
                </li>
                <li>
                    <a class="{{ request()->routeIs('bantuan') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                        href="{{ route('bantuan') }}">
                        <span class="">Selamat datang</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('bantuan.dashboard') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                        href="{{ route('bantuan.dashboard') }}">
                        <span class="">Dashboard</span>
                    </a>
                </li>
            </ul>

            <ul class="mt-4 space-y-2 border-t border-white pt-4 font-medium dark:border-gray-700">
                <li>
                    <span
                        class="group flex items-center rounded-lg pl-2 text-lg font-bold uppercase text-slate-300 dark:text-white dark:hover:bg-gray-700">
                        Transaksi Dokumen
                    </span>
                </li>
                <li>
                    <a class="{{ request()->routeIs('bantuan.penerimaan') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                        href="{{ route('bantuan.penerimaan') }}">
                        Penerimaan
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('bantuan.peminjaman') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                        href="{{ route('bantuan.peminjaman') }}">
                        Peminjaman
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('bantuan.pengembalian') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                        href="{{ route('bantuan.pengembalian') }}">
                        Pengembalian
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('bantuan.pengambilan') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                        href="{{ route('bantuan.pengambilan') }}">
                        Pengambilan
                    </a>
                </li>
            </ul>

            <ul class="mt-4 space-y-2 border-t border-white pt-4 font-medium dark:border-gray-700">
                <li>
                    <span
                        class="group flex items-center rounded-lg pl-2 text-lg font-bold uppercase text-slate-300 dark:text-white dark:hover:bg-gray-700">
                        Report
                    </span>
                </li>
                <li>
                    <a class="{{ request()->routeIs('bantuan.report') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                        href="{{ route('bantuan.report') }}">
                        Report
                    </a>
                </li>
            </ul>

            <ul class="mt-4 space-y-2 border-t border-white pt-4 font-medium dark:border-gray-700">
                <li>
                    <span
                        class="group flex items-center rounded-lg pl-2 text-lg font-bold uppercase text-slate-300 dark:text-white dark:hover:bg-gray-700">
                        Data
                    </span>
                </li>
                <li>
                    <a class="{{ request()->routeIs('bantuan.data') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                        href="{{ route('bantuan.data') }}">
                        Data
                    </a>
                </li>
            </ul>
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
