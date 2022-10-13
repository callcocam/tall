<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/simplebar.css') }}">
    <script src="{{ asset('js/simplebar.js') }}"></script>
    <!-- Styles -->
    @livewireStyles
</head>

<body>
    <div class="min-h-full" x-data="settings" x-on:resize.window="updateSidebar">
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        @livewire('tall::includes.admin.sidebar.mobile.nav-component')
        @tallNotifications()
        {{-- @livewire('includes.global.notifications') --}}

        <!-- Static sidebar for desktop -->
        @livewire('tall::includes.admin.sidebar.nav-component')

        <!-- Main column -->
        <div class="flex flex-col lg:pl-64">
            <!-- Search header -->
            @livewire('tall::includes.admin.header.search-component')
            <main class="flex-1">
                <!-- Page title & actions -->

                <div
                    class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                    <div class="min-w-0 flex-1">
                        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                            {{ app('currentTenant')->name }}</h1>
                    </div>
                    <div class="mt-4 flex sm:mt-0 sm:ml-4">
                        <!-- Page Heading -->
                        @livewire('tall::includes.admin.header-component')
                    </div>
                </div>
                <nav class="flex border-b border-gray-200 bg-white" aria-label="Breadcrumb">
                    <ol role="list" class="mx-auto flex w-full max-w-screen-xl space-x-4 px-4 sm:px-6 lg:px-8">
                        <li class="flex">
                            <div class="flex items-center">
                                <a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-gray-500">
                                    <!-- Heroicon name: mini/home -->
                                    <svg class="h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="sr-only">Home</span>
                                </a>
                            </div>
                        </li>
                        @if (isset($header))
                            {{ $header }}
                        @endif
                    </ol>
                </nav>
                <!-- Pinned projects -->
                <div class="mt-10 sm:hidden">
                    <div class="px-4 sm:px-6">
                        <h2 class="text-sm font-medium text-gray-900">Projects</h2>
                    </div>
                    <ul role="list" class="mt-3 divide-y divide-gray-100 border-t border-gray-200">
                        <li>
                            <a href="#"
                                class="group flex items-center justify-between px-4 py-4 hover:bg-gray-50 sm:px-6">
                                <span class="flex items-center space-x-3 truncate">
                                    <span class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-pink-600"
                                        aria-hidden="true"></span>
                                    <span class="truncate text-sm font-medium leading-6">
                                        GraphQL API
                                        <span class="truncate font-normal text-gray-500">in Engineering</span>
                                    </span>
                                </span>
                                <!-- Heroicon name: mini/chevron-right -->
                                <svg class="ml-4 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>

                        <!-- More projects... -->
                    </ul>
                </div>

                <!-- Projects list (only on smallest breakpoint) -->

                <div class="px-5 py-2 shadow bg-gray-100">
                    {{ $slot }}
                    @isset($querysLogs)
                        @if ($querysLogs)
                            <div class="bg-gray-800 p-4 border-white boder-2">
                                <table class="text-gray-50 flex w-full space-y-3">
                                    @foreach ($querysLogs as $item)
                                        <tr>
                                            <td class="border-b">
                                                {{ data_get($item, 'query') }}
                                            </td>
                                            <td class="border-b">
                                                {{ data_get($item, 'time') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        @endisset
                    @endif
                </div>

            </main>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
    @stack('scripts')
</body>

</html>
