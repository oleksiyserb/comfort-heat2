<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>

    @stack('styles')
</head>
<body class="bg-gray-50">
    <div class="min-h-full">
        <nav x-data="{ open: false }" class="bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg"
                                 alt="Workflow">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <x-admin-links
                                    :href="url('dashboard')"
                                    :class="request()->is('dashboard') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                                >
                                    Dashboard
                                </x-admin-links>

                                <x-admin-links
                                    :href="url('admin/products')"
                                    :class="request()->is('admin/products*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                                >
                                    Products
                                </x-admin-links>

                                <x-admin-links
                                    :href="url('admin/projects')"
                                    :class="request()->is('admin/projects*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                                >
                                    Projects
                                </x-admin-links>

                                <x-admin-links
                                    :href="url('admin/articles')"
                                    :class="request()->is('admin/articles*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                                >
                                    Articles
                                </x-admin-links>

                                <x-admin-links
                                    :href="url('admin/users')"
                                    :class="request()->is('admin/users*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                                >
                                    Users
                                </x-admin-links>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <div x-data="{ showPanel: false }" class="ml-3 relative">
                                <div>
                                    <button
                                        @click="showPanel = !showPanel"
                                        type="button"
                                        class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full"
                                             src="https://i.pravatar.cc/60?u={{ auth()->user()->id }}"
                                             alt="">
                                    </button>
                                </div>
                                <form method="POST" action="{{ route('logout') }}"
                                      x-show="showPanel"
                                      class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                      aria-orientation="vertical" aria-labelledby="user-menu-button"
                                      tabindex="-1">
                                    @csrf
                                    <button type="submit" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                            tabindex="-1" id="user-menu-item-2">Sign out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <button
                            @click="open = !open"
                            type="button"
                            class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="md:hidden" id="mobile-menu" x-show="open">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <x-admin-links
                        :href="url('dashboard')"
                        :class="request()->is('dashboard') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                    >
                        Dashboard
                    </x-admin-links>

                    <x-admin-links
                        :href="url('admin/products')"
                        :class="request()->is('admin/products') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                    >
                        Products
                    </x-admin-links>

                    <x-admin-links
                        :href="url('admin/projects')"
                        :class="request()->is('admin/projects') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                    >
                        Projects
                    </x-admin-links>

                    <x-admin-links
                        :href="url('admin/articles')"
                        :class="request()->is('admin/articles') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                    >
                        Articles
                    </x-admin-links>

                    <x-admin-links
                        :href="url('admin/users')"
                        :class="request()->is('admin/users') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                    >
                        Users
                    </x-admin-links>
                </div>
                <div class="pt-4 pb-3 border-t border-gray-700">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full"
                                 src="https://i.pravatar.cc/60?u={{ auth()->user()->id }}"
                                 alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium leading-none text-white">{{ auth()->user()->name }}</div>
                        </div>
                    </div>
                    <div class="mt-3 px-2 space-y-1">
                        <a href="#"
                           class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Sign
                            out</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <main>
        {{ $slot }}
    </main>

    @stack('scripts')
</body>
</html>
