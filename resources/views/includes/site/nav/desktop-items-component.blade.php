<div class="group inline-block" x-data="{ active: false }" @click.away="active = false" @close.stop="active = false">
    <button x-on:click="active = !active" :class="{ 'hover:bg-gray-100': !active }"
        class="outline-none focus:outline-none px-2 py-4 bg-white rounded-sm flex items-center min-w-32 w-full text-left">
        <span class=" font-semibold flex-1">{{ __(data_get($menu, 'sub_menu.name')) }}</span>
        <span>
            <svg :class="{ '-rotate-180': active }"
                class="fill-current h-4 w-4 transform  transition duration-150 ease-in-out"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
            </svg>
        </span>
    </button>
    <ul x-show="active" x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        x-description="Dropdown menu, show/hide based on menu state." :class="{ 'scale-100': active }"
        class="bg-white rounded-sm transform scale-0 lg:absolute transition duration-150 ease-in-out origin-top min-w-32">
        @foreach ($sub_menus as $sub_menu)
            @if ($items = data_get($sub_menu, 'sub_menus', []))
                @if (count($items))
                    @include('tall::includes.site.nav.dropdown', ['items' => $items, 'item' => $sub_menu])
                @else
                    <li class="px-3 py-3 hover:bg-gray-100">
                        {{-- tall/resources/views/components/nav/link.blade.php --}}
                        <x-tall::nav.link :item="$sub_menu" />
                    </li>
                @endif
            @endif
        @endforeach
    </ul>
</div>
