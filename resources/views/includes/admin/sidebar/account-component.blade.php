<div class="relative inline-block px-3 text-left mt-1" x-data="{
    open: false,
    toggle() {
        this.open = !this.open
    }
}">
    <div>
        <button x-on:click="toggle" type="button"
            class="group w-full rounded-md bg-gray-100 px-3.5 py-2 text-left text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-gray-100"
            id="options-menu-button" aria-expanded="false" aria-haspopup="true">
            <span class="flex w-full items-center justify-between">
                <span class="flex min-w-0 items-center justify-between space-x-3">
                    <img class="h-10 w-10 flex-shrink-0 rounded-full bg-gray-300"
                        src="{{ auth()->user()->profile_photo_url }}" alt="">
                    <span class="flex min-w-0 flex-1 flex-col">
                        <span class="truncate text-sm font-medium text-gray-900">{{ auth()->user()->name }}</span>
                        <span class="truncate text-sm text-gray-500">{{ auth()->user()->email }}</span>
                    </span>
                </span>
                <!-- Heroicon name: mini/chevron-up-down -->
                <svg class="h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </button>
    </div>
    <div x-show="open" x-cloak @click.away="open = false" @close.stop="open = false"
        x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95"
        x-description="Dropdown menu, show/hide based on menu state."
        class="absolute right-0 left-0 z-10 mx-3 mt-1 origin-top divide-y divide-gray-200 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu" aria-orientation="vertical" aria-labelledby="options-menu-button" tabindex="-1">
        <div class="py-1" role="none">
            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
            <a href="{{ route('profile.show') }}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                tabindex="-1" id="options-menu-item-0">{{ __('Meus dados') }}</a>
        </div>

        <!-- Authentication -->
        <form class="py-1" role="none" method="POST" action="{{ route('logout') }}" x-data>
            @csrf

            <a class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" href="{{ route('logout') }}"
                @click.prevent="$root.submit();">
                {{ __('Deslogar') }}
            </a>
        </form>
    </div>
</div>
