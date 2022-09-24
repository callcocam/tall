<li x-data="{
    active: false
}" @click.away="active = false" @close.stop="active = false"
    :class="{ 'hover:bg-gray-100': !active }" class="rounded-sm relative px-3 py-3 ">
    <a x-on:click.prevent="active = !active" href=""
        class="item-link w-full text-left flex items-center outline-none focus:outline-none">
        <span class=" flex-1">{{ data_get($item, 'name') }}</span>
        <span class="mr-auto">
            <svg :class="{ 'rotate-90': active, '-rotate-90': !active }"
                class="item-icon fill-current h-4 w-4 transition duration-150 ease-in-out"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
            </svg>
        </span>
    </a>
    <ul x-show="active" :class="{ 'scale-item-active': active && window.outerWidth > 1200 }"
        class="lg:scale-item bg-white rounded-sm lg:absolute top-0 right-0 transition duration-150 ease-in-out origin-top-left min-w-max z-20">
        @foreach ($items as $item)
            @if ($sub_items = data_get($item, 'sub_menus', []))
                @if (count($sub_items))
                    @include('tall::includes.site.nav.dropdown', ['items' => $sub_items, 'item' => $item])
                @else
                    <li class="px-3 py-3 hover:bg-gray-100">
                        {{-- tall/resources/views/components/nav/link.blade.php --}}
                        <x-tall::nav.link :item="$item" />
                    </li>
                @endif
            @endif
        @endforeach
    </ul>
</li>
