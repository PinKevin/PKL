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
                        <img class="me-3 h-9 items-center" src="/img/logo-baru.png" alt="btn-logo" />
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="ms-3 flex items-center">
                        <div>
                            <button
                                class="flex rounded-full bg-gray-800 text-sm focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                data-dropdown-toggle="dropdown-user" type="button" aria-expanded="false">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
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
                                        href="/logout" role="menuitem">
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
                    <a class="{{ request()->routeIs('dashboard') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                        href="/dashboard">
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
                {{-- <li>
                    <a class="{{ request()->routeIs('berkas') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                        href="/berkas">
                        <svg class="h-5 w-5 flex-shrink-0 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        <span class="ms-3 flex-1 whitespace-nowrap">Berkas Pengambilan</span>
                    </a>
                </li> --}}
                {{-- <li>
                    <a class="{{ request()->routeIs('surat-roya.*') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                        href="/surat-roya">
                        <svg class="h-5 w-5 flex-shrink-0 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                            <path
                                d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                            <path
                                d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                        </svg>
                        <span class="ms-3 flex-1 whitespace-nowrap">Surat Roya</span>
                    </a>
                </li> --}}
                {{-- <li>
                    <a class="{{ request()->routeIs('bast.*') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                        href="/bast">
                        <svg class="h-5 w-5 flex-shrink-0 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="ms-3 flex-1 whitespace-nowrap">BAST</span>
                    </a>
                </li> --}}
                <li>
                    <a class="{{ request()->routeIs('penerimaan.*') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                        href="{{ route('penerimaan.index') }}">
                        <svg class="h-5 w-5 flex-shrink-0 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M9 7V2.2a2 2 0 0 0-.5.4l-4 3.9a2 2 0 0 0-.3.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-5h7.6l-.3.3a1 1 0 0 0 1.4 1.4l2-2c.4-.4.4-1 0-1.4l-2-2a1 1 0 0 0-1.4 1.4l.3.3H4V9h5a2 2 0 0 0 2-2Z"
                                clip-rule="evenodd" />
                        </svg>

                        <span class="ms-3 flex-1 whitespace-nowrap">Penerimaan</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('peminjaman.*') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                        href="{{ route('peminjaman.index') }}">
                        {{-- <svg class="h-5 w-5 flex-shrink-0 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M9 7V2.2a2 2 0 0 0-.5.4l-4 3.9a2 2 0 0 0-.3.5H9Zm2 0V2h7a2 2 0 0 1 2 2v9.3l-2-2a1 1 0 0 0-1.4 1.4l.3.3h-6.6a1 1 0 1 0 0 2h6.6l-.3.3a1 1 0 0 0 1.4 1.4l2-2V20a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z"
                                clip-rule="evenodd" />
                        </svg> --}}
                        <svg class="h-5 w-5 flex-shrink-0 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9 7V2.22117C8.81709 2.31517 8.64812 2.43766 8.5 2.58579L4.58579 6.5C4.43766 6.64812 4.31517 6.81709 4.22117 7H9ZM11 7V2H18C19.1046 2 20 2.89543 20 4V13.2929C19.819 13.1119 19.569 13 19.2929 13H12.7071L13 12.7071C13.3905 12.3166 13.3905 11.6834 13 11.2929C12.6095 10.9024 11.9763 10.9024 11.5858 11.2929L9.58578 13.2929C9.19526 13.6834 9.19526 14.3166 9.58578 14.7071L11.5858 16.7071C11.9763 17.0976 12.6095 17.0976 13 16.7071C13.3905 16.3166 13.3905 15.6834 13 15.2929L12.7071 15H19.2929C19.569 15 19.819 14.8881 20 14.7071V20C20 21.1046 19.1046 22 18 22H6C4.89543 22 4 21.1046 4 20V9H9C10.1046 9 11 8.10457 11 7Z">
                        </svg>



                        <span class="ms-3 flex-1 whitespace-nowrap">Peminjaman</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('pengembalian.*') ? 'bg-blue-300 text-gray-900 dark:bg-gray-700' : 'text-slate-100' }} group flex items-center rounded-lg p-2 hover:bg-blue-300 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                        href="{{ route('pengembalian.index') }}">
                        <svg class="h-5 w-5 flex-shrink-0 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M9 7V2.2a2 2 0 0 0-.5.4l-4 3.9a2 2 0 0 0-.3.5H9Zm2 0V2h7a2 2 0 0 1 2 2v9.3l-2-2a1 1 0 0 0-1.4 1.4l.3.3h-6.6a1 1 0 1 0 0 2h6.6l-.3.3a1 1 0 0 0 1.4 1.4l2-2V20a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z"
                                clip-rule="evenodd" />
                        </svg>

                        <span class="ms-3 flex-1 whitespace-nowrap">Pengembalian</span>
                    </a>
                </li>

                <ul class="mt-4 space-y-2 border-t border-white pt-4 font-medium dark:border-gray-700">
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
                </ul>
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
