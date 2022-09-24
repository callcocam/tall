<div class="space-y-1" x-data="sidebar(false)">
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
                class="mr-3 h-4 w-4 flex-shrink-0 " />
        @elseif(\View::exists(sprintf('tall::components.icons.solid.%s', $menu->icone)))
            <x-dynamic-component component="tall::icons.solid.{{ $menu->icone }}"
                class="mr-3 h-4 w-4 flex-shrink-0 " />
        @else
            <x-dynamic-component component="tall::icons.outline.chevron-right"
                class="mr-3 h-4 w-4 flex-shrink-0 " />
        @endif
        <span class="flex-1 uppercase">{{ $menu->name }} </span>
        <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
        <svg :class="{ 'text-gray-400 rotate-90': open, 'text-gray-300': !(open) }"
            class="text-gray-300 ml-3 h-4 w-4 flex-shrink-0 transform transition-colors duration-150 ease-in-out group-hover:text-gray-400"
            viewBox="0 0 20 20" aria-hidden="true">
            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
        </svg>
    </button>
    <!-- Expandable link section, show/hide based on state. -->
    <div class="space-y-1 bg-gray-50" id="sub-menu-{{ $menu->id }} " x-show="open">
        @foreach ($sub_menus as $sub_menu)
            <a @if (\Route::has($sub_menu->slug)) href="{{ route($sub_menu->slug) }}"                 
                @else
                href="{{ $sub_menu->link }}" @endif
                class="group flex w-full items-center rounded-md py-2 pl-11 pr-2 text-sm font-medium  {{ request()->routeIs($sub_menu->slug) ? 'bg-gray-200 text-gray-900' : 'text-gray-700 hover:text-gray-900 hover:bg-gray-200' }}">
                @if (\View::exists(sprintf('tall::components.icons.outline.%s', $sub_menu->icone)))
                    <x-dynamic-component
                        component="tall::icons.outline.{{ $sub_menu->icone }}"
                        class="mr-1 h-4 w-4 flex-shrink-0 " />
                @elseif(\View::exists(sprintf('tall::components.icons.solid.%s', $sub_menu->icone)))
                    <x-dynamic-component
                        component="tall::icons.solid.{{ $sub_menu->icone }}"
                        class="mr-1 h-4 w-4 flex-shrink-0 " />
                @else
                    <x-dynamic-component component="tall::icons.outline.chevron-right"
                        class="mr-1 h-4 w-4 flex-shrink-0 " />
                @endif
                <span>
                    {{ $sub_menu->name }}
                </span>
            </a>
        @endforeach
    </div>
</div>