@extends('layouts.main')

@section('body')
    <nav class="fixed top-0 z-50 w-full border-b border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
        <div class="bg-gray-50 px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <button
                        class="inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 sm:hidden"
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
                    {{-- <a class="ms-60" href="#">
                        <svg class="h-6 w-6 text-slate-500 hover:text-slate-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm9-3a1.5 1.5 0 0 1 2.5 1.1 1.4 1.4 0 0 1-1.5 1.5 1 1 0 0 0-1 1V14a1 1 0 1 0 2 0v-.5a3.4 3.4 0 0 0 2.5-3.3 3.5 3.5 0 0 0-7-.3 1 1 0 0 0 2 .1c0-.4.2-.7.5-1Zm1 7a1 1 0 1 0 0 2 1 1 0 1 0 0-2Z"
                                clip-rule="evenodd" />
                        </svg>
                    </a> --}}
                    <div class="flex items-center">
                        <div class="ms-3 flex items-center">
                            <div>
                                <button class="flex rounded-lg p-1 text-sm hover:bg-gray-200 dark:focus:ring-gray-600"
                                    data-dropdown-toggle="dropdown-user" type="button" aria-expanded="false">
                                    <span class="sr-only">Open user menu</span>
                                    <svg class="h-6 w-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                            d="M5 7h14M5 12h14M5 17h14" />
                                    </svg>
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
        class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full border-r border-gray-200 bg-blue-500 pt-20 transition-transform dark:border-gray-700 dark:bg-gray-800 sm:translate-x-0"
        id="logo-sidebar" aria-label="Sidebar">
        <div class="h-full overflow-y-auto bg-blue-500 px-3 pb-4 dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a class="{{ request()->routeIs('admin-dashboard') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                        href="{{ route('admin-dashboard') }}">
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
                <li>
                    <a class="{{ request()->routeIs('admin-akun') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                        href="{{ route('admin-akun') }}">
                        <svg class="h-5 w-5 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M17 10v1.1l1 .5.8-.8 1.4 1.4-.8.8.5 1H21v2h-1.1l-.5 1 .8.8-1.4 1.4-.8-.8a4 4 0 0 1-1 .5V20h-2v-1.1a4 4 0 0 1-1-.5l-.8.8-1.4-1.4.8-.8a4 4 0 0 1-.5-1H11v-2h1.1l.5-1-.8-.8 1.4-1.4.8.8a4 4 0 0 1 1-.5V10h2Zm.4 3.6c.4.4.6.8.6 1.4a2 2 0 0 1-3.4 1.4A2 2 0 0 1 16 13c.5 0 1 .2 1.4.6ZM5 8a4 4 0 1 1 8 .7 7 7 0 0 0-3.3 3.2A4 4 0 0 1 5 8Zm4.3 5H7a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h6.1a7 7 0 0 1-1.8-7Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ms-3">Kelola Akun</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('admin-hak-akses.*') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                        href="{{ route('admin-hak-akses.index') }}">
                        <svg class="h-5 w-5 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M17 10v1.1l1 .5.8-.8 1.4 1.4-.8.8.5 1H21v2h-1.1l-.5 1 .8.8-1.4 1.4-.8-.8a4 4 0 0 1-1 .5V20h-2v-1.1a4 4 0 0 1-1-.5l-.8.8-1.4-1.4.8-.8a4 4 0 0 1-.5-1H11v-2h1.1l.5-1-.8-.8 1.4-1.4.8.8a4 4 0 0 1 1-.5V10h2Zm.4 3.6c.4.4.6.8.6 1.4a2 2 0 0 1-3.4 1.4A2 2 0 0 1 16 13c.5 0 1 .2 1.4.6ZM5 8a4 4 0 1 1 8 .7 7 7 0 0 0-3.3 3.2A4 4 0 0 1 5 8Zm4.3 5H7a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h6.1a7 7 0 0 1-1.8-7Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ms-3">Kelola Role</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('admin-izin.*') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                        href="{{ route('admin-izin.index') }}">
                        <svg class="h-5 w-5 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M17 10v1.1l1 .5.8-.8 1.4 1.4-.8.8.5 1H21v2h-1.1l-.5 1 .8.8-1.4 1.4-.8-.8a4 4 0 0 1-1 .5V20h-2v-1.1a4 4 0 0 1-1-.5l-.8.8-1.4-1.4.8-.8a4 4 0 0 1-.5-1H11v-2h1.1l.5-1-.8-.8 1.4-1.4.8.8a4 4 0 0 1 1-.5V10h2Zm.4 3.6c.4.4.6.8.6 1.4a2 2 0 0 1-3.4 1.4A2 2 0 0 1 16 13c.5 0 1 .2 1.4.6ZM5 8a4 4 0 1 1 8 .7 7 7 0 0 0-3.3 3.2A4 4 0 0 1 5 8Zm4.3 5H7a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h6.1a7 7 0 0 1-1.8-7Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ms-3">Kelola Izin</span>
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
