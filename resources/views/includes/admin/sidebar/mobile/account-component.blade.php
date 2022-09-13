<div class="relative ml-3" x-data="accountSideabar(false)">
    <div>
        <button x-on:click="toggle" type="button"
            class="flex max-w-xs items-center rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2"
            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
            <span class="sr-only">Open user menu</span>
            <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}"
                alt="{{ auth()->user()->name }}">
        </button>
    </div>
    <div x-show="open" x-cloak @click.away="open = false" @close.stop="open = false"
        x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95"
        x-description="Dropdown menu, show/hide based on menu state."
        class="absolute right-0 z-10 mt-2 w-48 origin-top-right divide-y divide-gray-200 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
        <div class="py-1" role="none">
            @if (\Route::has('admin.profile.view'))
                @can('admin.profile.view')
                    <a href="{{ route('admin.profile.view') }}"
                        class="text-gray-700 block px-4 py-2 text-sm {{ request()->routeIs('admin.profile.view') ? 'bg-gray-100 text-gray-900' : 'text-gray-700' }}"
                        role="menuitem" tabindex="-1" id="options-menu-item-0">{{ __('View profile') }}</a>
                @endcan
            @endif
            @if (\Route::has('admin.tenant.view'))
                @can('admin.tenant.view')
                    <a href="{{ route('admin.tenant.view') }}"
                        class="text-gray-700 block px-4 py-2 text-sm {{ request()->routeIs('admin.tenant.view') ? 'bg-gray-100 text-gray-900' : 'text-gray-700' }}"
                        role="menuitem" tabindex="-1" id="options-menu-item-0">{{ __('Settings') }}</a>
                @endcan
            @endif
        </div>
        <div class="py-1" role="none">
            @if (\Route::has('admin.users'))
                @can('admin.users')
                    <a href="{{ route('admin.users') }}"
                        class="text-gray-700 block px-4 py-2 text-sm {{ request()->routeIs('admin.users') ? 'bg-gray-100 text-gray-900' : 'text-gray-700' }}"
                        role="menuitem" tabindex="-1" id="options-users-item-3">{{ __('Users') }}</a>
                @endcan
            @endif
            @if (\Route::has('admin.roles'))
                @can('admin.roles')
                    <a href="{{ route('admin.roles') }}"
                        class="text-gray-700 block px-4 py-2 text-sm {{ request()->routeIs('admin.roles') ? 'bg-gray-100 text-gray-900' : 'text-gray-700' }}"
                        role="menuitem" tabindex="-1" id="options-roles-item-3">{{ __('Roles') }}</a>
                @endcan
            @endif
            @if (\Route::has('admin.permissions'))
                @can('admin.permissions')
                    <a href="{{ route('admin.permissions') }}"
                        class="text-gray-700 block px-4 py-2 text-sm {{ request()->routeIs('admin.permissions') ? 'bg-gray-100 text-gray-900' : 'text-gray-700' }}"
                        role="menuitem" tabindex="-1" id="options-permissions-item-3">{{ __('Permissions') }}</a>
                @endcan
            @endif
            @if (\Route::has('admin.menus'))
                @can('admin.menus')
                    <a href="{{ route('admin.menus') }}"
                        class="text-gray-700 block px-4 py-2 text-sm {{ request()->routeIs('admin.menus') ? 'bg-gray-100 text-gray-900' : 'text-gray-700' }}"
                        role="menuitem" tabindex="-1" id="options-menus-item-3">{{ __('Menus') }}</a>
                @endcan
            @endif
            @if (\Route::has('admin.sub-menus'))
                @can('admin.sub-menus')
                    <a href="{{ route('admin.sub-menus') }}"
                        class="text-gray-700 block px-4 py-2 text-sm {{ request()->routeIs('admin.sub-menus') ? 'bg-gray-100 text-gray-900' : 'text-gray-700' }}"
                        role="menuitem" tabindex="-1" id="options-sub-menus-item-3">{{ __('Sub Menus') }}</a>
                @endcan
            @endif
        </div>
        <div class="py-1" role="none">
            <form class="py-1" role="none" method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <a class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" href="{{ route('logout') }}"
                    @click.prevent="$root.submit();">
                    {{ __('Log Out') }}
                </a>
            </form>
        </div>
    </div>
</div>
