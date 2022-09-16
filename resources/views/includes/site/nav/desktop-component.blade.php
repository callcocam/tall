<!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative z-0  bg-white  shadow">
    <div class="relative z-10 mx-auto shadow-lg flex max-w-7xl px-4 sm:px-6 lg:px-8 border-b-2">
        <div class="flex flex-1">
            @if (\Route::has('home'))
                <div x-data="{}">
                    <a href="{{ route('home') }}"
                        class="{{ request()->routeIs('home') ? 'text-gray-900' : 'text-gray-500' }}  py-6 px-4 group inline-flex items-center  text-base font-medium hover:text-gray-900 focus:outline-none hover:bg-gray-50 border-transparent border-t-2 hover:border-gray-500"
                        aria-expanded="false">
                        <span>{{ __('Home') }}</span>
                    </a>
                </div>
            @endif
            @if ($menus = $this->menus)
                @foreach ($menus as $menu)
                    @livewire('tall::includes.site.nav.desktop-item-component', compact('menu'), key($menu->id))
                @endforeach
            @endif
        </div>
        @if (Route::has('login'))
            @guest
                <div class="flex justify-end">
                    <div x-data="{}">
                        <a href="{{ route('login') }}"
                            class="{{ request()->routeIs('login') ? 'text-gray-900' : 'text-gray-500' }}  py-6 px-4 group inline-flex items-center  text-base font-medium hover:text-gray-900 focus:outline-none hover:bg-gray-50 border-transparent border-t-2 hover:border-gray-500"
                            aria-expanded="false">
                            <span>{{ __('Login') }}</span>
                        </a>
                    </div>

                    @if (Route::has('register'))
                        <div x-data="{}">
                            <a href="{{ route('register') }}"
                                class="{{ request()->routeIs('register') ? 'text-gray-900' : 'text-gray-500' }}  py-6 px-4 group inline-flex items-center  text-base font-medium hover:text-gray-900 focus:outline-none hover:bg-gray-50 border-transparent border-t-2 hover:border-gray-500"
                                aria-expanded="false">
                                <span>{{ __('Register') }}</span>
                            </a>
                        </div>
                    @endif
                </div>
            @endguest
        @endif
    </div>
</div>
