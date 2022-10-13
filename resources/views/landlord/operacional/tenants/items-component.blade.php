<ul class="flex ml-5  flex-col text-left justify-start" x-data="" group-id="{{ data_get($submenu, 'id') }}"
    x-init="Sortablejs.create($el, {
        animation: 150,
        ghostClass: 'bg-blue-100',
        swap: true, // Enable swap plugin
        swapClass: 'bg-green-200',
        fallbackOnBody: true,
        group: 'group',
        onSort({ to }) {
            const groupId = to.getAttribute('group-id');
            const menuIds = Array.from(to.children).map(i => i.getAttribute('menu-id'))
            @this.reorderItems({ groupId, menuIds });
        }
    })">
    @if ($submenus = $this->sub_menus)
        @foreach ($submenus as $subitem)
            {{-- @if (data_get($stepMenus, sprintf('%s.%s', $menu->id, $subitem->id))) --}}
            <li menu-id="{{ data_get($subitem, 'id') }}" class="flex relative py-1  handler  cursor-move justify-start">
                <div class="relative flex items-center justify-start mx-6">
                    <div class="flex h-5 items-center">
                        <span id="menus-{{ $subitem->id }}"
                            class="h-4 w-4 rounded  border-gray-300 bg-indigo-600 flex items-center justify-center">
                            <x-tall-icons.outline.check class="h-5 w-5 text-white font-bold" />
                        </span>
                    </div>
                    <div class="ml-3 text-sm flex items-center space-x-2 justify-start">
                        <span class="font-medium text-gray-700 flex items-center">
                           <span> {{ data_get($subitem, 'parent_sub_menu.name') }}</span>
                            @if (data_get($subitem, 'parent_sub_menu.id'))
                                - <a href="{{ route('admin.sub-menus.view', data_get($subitem, 'parent_sub_menu')) }}"
                                    target="_blank"><x-tall-icons.outline.eye class="h-5 w-5 text-black font-bold" /></a>
                            @endif </span>
                        <span id="sub-menu-description-{{ $subitem->id }}" class="text-gray-500 flex flex-col">
                            <span class="text-sm text-gray-500 font-extrabold">({{ data_get($subitem, 'ordering') }}
                                @if (data_get($subitem, 'parent_sub_menu.slug'))
                                    {{ data_get($subitem, 'parent_sub_menu.slug') }}
                                @else
                                    {{ data_get($subitem, 'parent_sub_menu.link') }}
                                @endif )
                            </span>
                        </span>
                    </div>
                </div>
            </li>
            {{-- @endif --}}
        @endforeach
    @endif
</ul>
