<div
    class="hidden lg:fixed lg:inset-y-0 lg:flex lg:w-64 lg:flex-col lg:border-r lg:border-gray-200 lg:bg-gray-100 lg:pb-4">
    <div class="flex flex-shrink-0 items-center px-6 bg-gray-700 shadow-md justify-center py-2">
        <img class="w-auto h-10" src="{{ app('currentTenant')->cover_photo_url }}" alt="{{ app('currentTenant')->name }}">
    </div>
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div>
        <div class="flex  flex-1 flex-col ">
            <!-- User account dropdown -->
            @livewire('tall::includes.admin.sidebar.account-component')
            <!-- Sidebar Search -->
            @if (config('tall.selecttenant', false))
                <div class="mt-5 px-3">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        @if ($tenants = $this->tenants)
                            <select wire:model="tenant"
                                class="block w-full rounded-md border-gray-300 pl-9 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @foreach ($tenants as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
            @else
                @if (config('tall.searchmenus', true))
                    <div class="mt-5 px-3">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
                                aria-hidden="true">
                                <!-- Heroicon name: mini/magnifying-glass -->
                                <svg class="mr-3 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" name="search" id="search" wire:model.debounce.500ms="search"
                                class="block w-full rounded-md border-gray-300 pl-9 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                placeholder="Search" autocomplete="off">
                        </div>
                    </div>
                @endif
            @endif
            <!-- Navigation -->
            <div x-data="{}" x-init="new SimpleBar($el)">
                <nav class="mt-6 px-3 max-h-[400px] overflow-auto">
                    @if ($menus = $this->menus)
                        @foreach ($menus as $menu)
                            @if ($sub_menus = $menu->sub_menus)
                                @if ($sub_menus->count())
                                    <x-tall-nav.admin.dropdown-menu :item="$menu">
                                        @foreach ($sub_menus as $sub_menu)
                                            <x-tall-nav.admin.dropdown-link :item="$sub_menu" />
                                        @endforeach
                                    </x-tall-nav.admin.dropdown-menu>
                                @else
                                    <x-tall-nav.admin.link :item="$sub_menu" />
                                @endif
                            @endif
                            {{-- <li class="nav-title">Components</li> --}}
                        @endforeach
                    @endif
                    <div class="space-y-1">
                        <a class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-700 hover:text-gray-900 hover:bg-gray-50"
                            href="/" target="_blank">
                            <x-dynamic-component component="tall::icons.outline.home"
                                class="mr-3 h-4 w-4 flex-shrink-0 text-gray-400 " />
                            {{ __('Ir para o site') }}
                        </a>
                    </div>
                    <div class="space-y-1">
                        <form class="py-1" role="none" method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <a class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-700 hover:text-gray-900 hover:bg-gray-50"
                                role="menuitem" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                <x-dynamic-component component="tall::icons.outline.logout"
                                    class="mr-3 h-4 w-4 flex-shrink-0 text-gray-400 " />
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
