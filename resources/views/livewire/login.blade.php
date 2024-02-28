<div
    class="w-full rounded-sm bg-slate-100 shadow dark:border dark:border-gray-700 dark:bg-gray-800 sm:max-w-md md:mt-0 xl:p-0">
    <div class="space-y-4 p-6 sm:p-8 md:space-y-6">
        @if (session('loginError'))
            <div class="mb-4 mt-1 flex items-center rounded-lg border-t-4 border-red-400 bg-red-100 p-3 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="text-sm font-semibold">
                    {{ session('loginError') }}
                </div>
            </div>
        @endif
        @if (session('logoutSuccess'))
            <div class="mb-4 flex items-center rounded-lg border-t-4 border-green-300 bg-green-100 p-4 text-green-800 dark:border-green-800 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <svg class="h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('logoutSuccess') }}
                </div>
            </div>
        @endif
        <a class="mx-auto mb-8 flex items-center justify-center text-center text-2xl font-semibold text-gray-900 dark:text-white"
            href="/">
            <img class="mr-2 h-9 w-36" src="{{ asset('img/btn-logo.png') }}" alt="logo">
        </a>
        <h1
            class="text-center text-xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white md:text-2xl">
            Sign In
        </h1>
        <form class="space-y-4 md:space-y-6" wire:submit.prevent="authenticate">
            @csrf
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="username">
                    Username
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-blue-800 focus:ring-blue-800 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-900 dark:focus:ring-blue-900 sm:text-sm"
                    id="username" name="username" type="text" wire:model="username" placeholder="Username"
                    autocomplete="username">
                @error('username')
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
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="password">
                    Password
                </label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-blue-800 focus:ring-blue-800 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-900 dark:focus:ring-blue-900 sm:text-sm"
                    id="password" name="password" type="password" wire:model="password" placeholder="Password"
                    autocomplete="current-password">
                @error('password')
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
                class="w-full rounded-lg bg-blue-800 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-900 focus:outline-none focus:ring-4 focus:ring-blue-700 dark:bg-blue-800 dark:hover:bg-blue-900 dark:focus:ring-blue-900"
                type="submit">
                Masuk
            </button>
        </form>
    </div>
</div>
