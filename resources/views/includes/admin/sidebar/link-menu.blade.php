<a @if (\Route::has($menu->slug)) href="{{ route($menu->slug) }}"                 
    @else
    href="{{ $menu->link }}" @endif
    class="  group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs($menu->slug) ? 'bg-gray-200 text-gray-900' : 'text-gray-700 hover:text-gray-900 hover:bg-gray-50' }}"
    aria-current="page">
    @if (\View::exists(sprintf('tall::components.icons.outline.%s', $menu->icone)))
        <x-dynamic-component component="tall::icons.outline.{{ $menu->icone }}"
            class="mr-3 h-4 w-4 flex-shrink-0" />
    @elseif(\View::exists(sprintf('tall::components.icons.solid.%s', $menu->icone)))
        <x-dynamic-component component="tall::icons.solid.{{ $menu->icone }}"
            class="mr-3 h-4 w-4 flex-shrink-0" />
    @else
        <x-dynamic-component component="tall::icons.outline.chevron-right"
            class="mr-1 h-4 w-4 flex-shrink-0 " />
    @endif
    <span>{{ $menu->name }}</span>
</a>