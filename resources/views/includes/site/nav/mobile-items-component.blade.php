<div class="" x-data="{
    open: false,
    toggle() {
        this.open = !this.open
    }
}" x-on:mouseleave="open= false">
    <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
    <button x-on:mouseenter="open= true" type="button" :class="{ 'text-gray-900 bg-gray-50': open, 'text-gray-500': !open }"
        class="py-6 px-4 group inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none hover:bg-gray-50"
        aria-expanded="false">
        <span>{{ $menu->name }}</span>
        <svg :class="{ 'text-gray-600': open, 'text-gray-400': !open, '-rotate-90': open }"
            class=" ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
            fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd"
                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                clip-rule="evenodd" />
        </svg>
    </button>
    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-1"
        x-description="Flyout menu, show/hide based on flyout menu state."
        class="absolute inset-x-0 z-10 transform shadow-lg" x-cloak @click.away="open = false"
        @close.stop="open = false">
        <div class="absolute inset-0 flex" aria-hidden="true">
            <div class="w-1/2 bg-gray-50"></div>
            <div class="w-1/2 bg-gray-50"></div>
        </div>
        <div class="relative mx-auto grid max-w-7xl grid-cols-1 lg:grid-cols-2">
            <nav class="grid gap-y-10  px-4 py-8 sm:grid-cols-2 sm:gap-x-8 sm:py-12 sm:px-6 lg:px-8 xl:pr-12"
                aria-labelledby="solutions-heading">
                <h2 id="solutions-heading" class="sr-only">Solutions menu</h2>
                <div>
                    <h3 class="text-base font-medium text-gray-500">{{ $menu->name }}</h3>
                    <ul role="list" class="mt-5 space-y-6">
                        @foreach ($sub_menus as $sub_menu)
                            @if (\Route::has($sub_menu->slug))
                                <li class="flow-root">
                                    <a href="{{ route($sub_menu->slug) }}"
                                        class="-m-3 flex items-center rounded-md p-3 text-base font-medium text-gray-900 transition duration-150 ease-in-out hover:bg-gray-50">
                                        <!-- Heroicon name: outline/information-circle -->
                                        @if (\View::exists(sprintf('tall::components.icons.outline.%s', $sub_menu->icone)))
                                            <x-dynamic-component component="tall::icons.outline.{{ $sub_menu->icone }}"
                                                class="h-6 w-6 flex-shrink-0 text-gray-400" />
                                        @elseif(\View::exists(sprintf('tall::components.icons.solid.%s', $sub_menu->icone)))
                                            <x-dynamic-component component="tall::icons.solid.{{ $sub_menu->icone }}"
                                                class="h-6 w-6 flex-shrink-0 text-gray-400" />
                                        @else
                                            <x-dynamic-component component="tall::icons.solid.chevron-right"
                                                class="h-6 w-6 flex-shrink-0 text-gray-400" />
                                        @endif
                                        <span class="ml-4">{{ $sub_menu->name }}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h3 class="text-base font-medium text-gray-500">Resources</h3>
                    <ul role="list" class="mt-5 space-y-6">
                        <li class="flow-root">
                            <a href="#"
                                class="-m-3 flex items-center rounded-md p-3 text-base font-medium text-gray-900 transition duration-150 ease-in-out hover:bg-gray-50">
                                <!-- Heroicon name: outline/user-group -->
                                <svg class="h-6 w-6 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                </svg>
                                <span class="ml-4">Community</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            {{-- <div class="bg-gray-50 px-4 py-8 sm:py-12 sm:px-6 lg:px-8 xl:pl-12">
                <div>
                    <h3 class="text-base font-medium text-gray-500">From the blog</h3>
                    <ul role="list" class="mt-6 space-y-6">
                        <li class="flow-root">
                            <a href="#"
                                class="-m-3 flex rounded-lg p-3 transition duration-150 ease-in-out hover:bg-gray-100">
                                <div class="hidden flex-shrink-0 sm:block">
                                    <img class="h-20 w-32 rounded-md object-cover"
                                        src="https://images.unsplash.com/photo-1558478551-1a378f63328e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2849&q=80"
                                        alt="">
                                </div>
                                <div class="min-w-0 flex-1 sm:ml-8">
                                    <h4 class="truncate text-base font-medium text-gray-900">Boost your conversion rate
                                    </h4>
                                    <p class="mt-1 text-sm text-gray-500">Eget ullamcorper ac ut vulputate fames nec
                                        mattis pellentesque elementum. Viverra tempor id mus.</p>
                                </div>
                            </a>
                        </li>

                        <li class="flow-root">
                            <a href="#"
                                class="-m-3 flex rounded-lg p-3 transition duration-150 ease-in-out hover:bg-gray-100">
                                <div class="hidden flex-shrink-0 sm:block">
                                    <img class="h-20 w-32 rounded-md object-cover"
                                        src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2300&q=80"
                                        alt="">
                                </div>
                                <div class="min-w-0 flex-1 sm:ml-8">
                                    <h4 class="truncate text-base font-medium text-gray-900">How to use search engine
                                        optimization to drive traffic to your site</h4>
                                    <p class="mt-1 text-sm text-gray-500">Eget ullamcorper ac ut vulputate fames nec
                                        mattis pellentesque elementum. Viverra tempor id mus.</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="mt-6 text-sm font-medium">
                    <a href="#"
                        class="text-indigo-600 transition duration-150 ease-in-out hover:text-indigo-500">
                        View all posts
                        <span aria-hidden="true"> &rarr;</span>
                    </a>
                </div>
            </div> --}}
        </div>
    </div>
</div>
