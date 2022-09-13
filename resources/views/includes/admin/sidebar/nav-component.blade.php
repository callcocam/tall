<div
    class="hidden lg:fixed lg:inset-y-0 lg:flex lg:w-64 lg:flex-col lg:border-r lg:border-gray-200 lg:bg-gray-100 lg:pt-5 lg:pb-4">
    <div class="flex flex-shrink-0 items-center px-6">
        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=purple&shade=500" alt="Your Company">
    </div>
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div>
        <div class="flex  flex-1 flex-col ">
            <!-- User account dropdown -->
            @livewire('tall::includes.admin.sidebar.account-component')
            <!-- Sidebar Search -->
            <div class="mt-5 px-3">
                <label for="search" class="sr-only">Search</label>
                <div class="relative mt-1 rounded-md shadow-sm">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
                        aria-hidden="true">
                        <!-- Heroicon name: mini/magnifying-glass -->
                        <svg class="mr-3 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" name="search" id="search"
                        class="block w-full rounded-md border-gray-300 pl-9 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        placeholder="Search">
                </div>
            </div>
            <!-- Navigation -->
            <nav class="mt-6 px-3" x-data="{}" x-init="new SimpleBar($el)">
                @if ($menus = $this->menus)
                    @foreach ($menus as $menu)
                        @if ($sub_menus = $menu->sub_menus)
                            @if ($sub_menus->count())
                                <div class="space-y-1" x-data="{
                                    {{-- open: @etangle(request()->routeIs($menu->parents->toArray())), --}}
                                    open: false,
                                        toggle() {
                                            this.open = !this.open
                                        },
                                        init() {}
                                }">
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
                                        @if (\View::exists(sprintf('components.icons.outline.%s', $menu->icone)))
                                            <x-dynamic-component component="icons.outline.{{ $menu->icone }}"
                                                class="mr-3 h-6 w-6 flex-shrink-0 text-gray-400 " />
                                        @elseif(\View::exists(sprintf('components.icons.solid.%s', $menu->icone)))
                                            <x-dynamic-component component="icons.solid.{{ $menu->icone }}"
                                                class="mr-3 h-6 w-6 flex-shrink-0 text-gray-400 " />
                                        @endif
                                        <span class="flex-1 uppercase">{{ $menu->name }} </span>
                                        <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                                        <svg :class="{ 'text-gray-400 rotate-90': open, 'text-gray-300': !(open) }"
                                            class="text-gray-300 ml-3 h-5 w-5 flex-shrink-0 transform transition-colors duration-150 ease-in-out group-hover:text-gray-400"
                                            viewBox="0 0 20 20" aria-hidden="true">
                                            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                        </svg>
                                    </button>
                                    <!-- Expandable link section, show/hide based on state. -->
                                    <div class="space-y-1 bg-gray-50" id="sub-menu-{{ $menu->id }} " x-show="open">
                                        @foreach ($sub_menus as $sub_menu)
                                            @if (\Route::has($sub_menu->slug))
                                                <a href="{{ route($sub_menu->slug) }}"
                                                    class="group flex w-full items-center rounded-md py-2 pl-11 pr-2 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 {{ request()->routeIs($sub_menu->slug) ? ' text-gray-600' : 'text-gray-900' }}">{{ $sub_menu->name }}</a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                @if (\Route::has($menu->slug))
                                    <div class="space-y-1">
                                        <!-- Current: "bg-gray-200 text-gray-900", Default: "text-gray-700 hover:text-gray-900 hover:bg-gray-50" -->
                                        <a href="{{ route($menu->slug) }}"
                                            class="text-gray-700 hover:text-gray-900 hover:bg-gray-50  group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                                            aria-current="page">
                                            @if (\View::exists(sprintf('components.icons.outline.%s', $menu->icone)))
                                                <x-dynamic-component component="icons.outline.{{ $menu->icone }}"
                                                    class="mr-3 h-6 w-6 flex-shrink-0 text-gray-400 " />
                                            @elseif(\View::exists(sprintf('components.icons.solid.%s', $menu->icone)))
                                                <x-dynamic-component component="icons.solid.{{ $menu->icone }}"
                                                    class="mr-3 h-6 w-6 flex-shrink-0 text-gray-400 " />
                                            @endif
                                            {{ $menu->name }}
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
</div>