<div x-data="{}">
    <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
    <a href="{{ $menu->slug }}"
        class="{{ request()->routeIs($menu->slug) ? 'text-gray-900' : 'text-gray-500' }}  py-6 px-4 group inline-flex items-center  text-base font-medium hover:text-gray-900 focus:outline-none hover:bg-gray-50"
        aria-expanded="false">
        <span>{{ $menu->name }}</span>
        <!--
    Heroicon name: mini/chevron-down

    Item active: "text-gray-600", Item inactive: "text-gray-400"
  -->
        <svg class="{{ request()->routeIs($menu->slug) ? 'text-gray-600' : 'text-gray-400' }} ml-2 h-5 w-5 group-hover:text-gray-500"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd"
                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                clip-rule="evenodd" />
        </svg>
    </a>
</div>
