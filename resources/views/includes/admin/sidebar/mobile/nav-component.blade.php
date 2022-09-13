<div x-cloak class="relative z-40 " x-show="$store.sidebar.open" role="dialog" aria-modal="true">
    <div x-show="$store.sidebar.open" class="fixed inset-0 bg-gray-600 bg-opacity-75"
        x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        x-description="Off-canvas menu backdrop, show/hide based on off-canvas menu state."></div>

    <div class="fixed inset-0 z-40 flex" x-show="$store.sidebar.open"
        x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-out-in duration-300 transform"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-ful"
        x-description="Off-canvas menu, show/hide based on off-canvas menu state.">
        <div class="relative flex w-full max-w-xs flex-1 flex-col bg-white pt-5 pb-4">
            <div class="absolute top-0 right-0 -mr-12 pt-2">
                <button type="button" x-on:click="$store.sidebar.open = false"
                    x-transition:enter="ease-in-out duration-300" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="-opacity-0"
                    x-description="Close button, show/hide based on off-canvas menu state."
                    class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <span class="sr-only">Close sidebar</span>
                    <!-- Heroicon name: outline/x-mark -->
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-shrink-0 items-center px-4">
                <img class="h-8 w-auto" src="{{ app('currentTenant')->cover_photo_url }}"
                    alt="{{ app('currentTenant')->name }}">
            </div>
            <div class="mt-5 h-0 flex-1 overflow-y-auto">
                <nav class="px-2">
                    @if ($menus = $this->menus)
                        @foreach ($menus as $menu)
                            @if ($sub_menus = $menu->sub_menus)
                                @if ($sub_menus->count())
                                    <div class="space-y-1" x-data="sidebar({{ request()->routeIs($menu->parents->toArray()) }})">
                                        <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                                        <button type="button" x-on:click="toggle"
                                            :class="{
                                                'bg-gray-200 text-gray-900': open,
                                                'text-gray-600 hover:bg-gray-50 hover:text-gray-900': !(
                                                    open)
                                            }"
                                            class=" group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium"
                                            aria-controls="sub-menu-{{ $menu->id }} " {{-- x-bind:aria-expanded="open.toString()" --}}>
                                            <!-- Heroicon name: outline/users -->
                                            @if (\View::exists(sprintf('tall::components.icons.outline.%s', $menu->icone)))
                                                <x-dynamic-component component="tall::icons.outline.{{ $menu->icone }}"
                                                    class="mr-3 h-6 w-6 flex-shrink-0 text-gray-400 " />
                                            @elseif(\View::exists(sprintf('tall::components.icons.solid.%s', $menu->icone)))
                                                <x-dynamic-component component="tall::icons.solid.{{ $menu->icone }}"
                                                    class="mr-3 h-6 w-6 flex-shrink-0 text-gray-400 " />
                                            @endif
                                            {{-- <svg :class="{ 'group-hover:text-gray-500': !open }"
                                            class="mr-3 h-6 w-6 flex-shrink-0 text-gray-400 "
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                        </svg> --}}
                                            <span class="flex-1 uppercase">{{ $menu->name }} </span>
                                            <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                                            <svg :class="{ 'text-gray-400 rotate-90': open, 'text-gray-300': !(open) }"
                                                class="text-gray-300 ml-3 h-5 w-5 flex-shrink-0 transform transition-colors duration-150 ease-in-out group-hover:text-gray-400"
                                                viewBox="0 0 20 20" aria-hidden="true">
                                                <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                            </svg>
                                        </button>
                                        <!-- Expandable link section, show/hide based on state. -->
                                        <div class="space-y-1 bg-gray-50" id="sub-menu-{{ $menu->id }} "
                                            x-show="open">
                                            @foreach ($sub_menus as $sub_menu)
                                                @if (\Route::has($sub_menu->slug))
                                                    <a href="{{ route($sub_menu->slug) }}"
                                                        class="group flex w-full items-center rounded-md py-2 pl-11 pr-2 text-sm font-medium  {{ request()->routeIs($sub_menu->slug) ? 'bg-gray-200 text-gray-900' : 'text-gray-700 hover:text-gray-900 hover:bg-gray-200' }}">{{ $sub_menu->name }}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    @if (\Route::has($menu->slug))
                                        <div class="space-y-1">
                                            <!-- Current: "bg-gray-200 text-gray-900", Default: "text-gray-700 hover:text-gray-900 hover:bg-gray-50" -->
                                            <a href="{{ route($menu->slug) }}"
                                                class="  group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs($menu->slug) ? 'bg-gray-200 text-gray-900' : 'text-gray-700 hover:text-gray-900 hover:bg-gray-50' }}"
                                                aria-current="page">
                                                @if (\View::exists(sprintf('tall::components.icons.outline.%s', $menu->icone)))
                                                    <x-dynamic-component
                                                        component="tall::icons.outline.{{ $menu->icone }}"
                                                        class="mr-3 h-6 w-6 flex-shrink-0 text-gray-400 " />
                                                @elseif(\View::exists(sprintf('tall::components.icons.solid.%s', $menu->icone)))
                                                    <x-dynamic-component
                                                        component="tall::icons.solid.{{ $menu->icone }}"
                                                        class="mr-3 h-6 w-6 flex-shrink-0 text-gray-400 " />
                                                @endif
                                                <span>{{ $menu->name }}</span>
                                            </a>
                                        </div>
                                    @endif
                                @endif
                            @endif
                            {{-- <li class="nav-title">Components</li> --}}
                        @endforeach
                    @endif
                </nav>
            </div>
        </div>

        <div class="w-14 flex-shrink-0" aria-hidden="true">
            <!-- Dummy element to force sidebar to shrink to fit close icon -->
        </div>
    </div>
</div>
