<a @if (\Route::has(data_get($menu,'sub_menu.slug'))) href="{{ route(data_get($menu,'sub_menu.slug')) }}"                 
    @else
    href="{{ data_get($menu,'sub_menu.link') }}" @endif
    class="  group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs(data_get($menu,'sub_menu.slug')) ? 'bg-gray-200 text-gray-900' : 'text-gray-700 hover:text-gray-900 hover:bg-gray-50' }}"
    aria-current="page">
    @if (\View::exists(sprintf('tall::components.icons.outline.%s', data_get($menu,'sub_menu.icone'))))
        <x-dynamic-component component="tall::icons.outline.{{ data_get($menu,'sub_menu.icone') }}"
            class="mr-3 h-4 w-4 flex-shrink-0" />
    @elseif(\View::exists(sprintf('tall::components.icons.solid.%s', data_get($menu,'sub_menu.icone'))))
        <x-dynamic-component component="tall::icons.solid.{{ data_get($menu,'sub_menu.icone') }}"
            class="mr-3 h-4 w-4 flex-shrink-0" />
    @else
        <x-dynamic-component component="tall::icons.outline.chevron-right"
            class="mr-1 h-4 w-4 flex-shrink-0 " />
    @endif
    <span>{{ data_get($menu,'sub_menu.name') }}</span>
</a>