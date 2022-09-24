<ul class="flex flex-col" x-data="{ isSortable: true }">
    <li>
        <div class="bg-blue-100 rounded-lg px-3 py-1 flex items-center justify-between">
            <span>{{ $menu->name }}</span>
        </div>
    </li>
    <li class="flex flex-col relative text-center space-y-3  w-full" x-init="Sortablejs.create($el, {
        sort: isSortable,
        animation: 150,
        swap: true, // Enable swap plugin
        swapClass: 'bg-green-200',
        ghostClass: 'bg-blue-100',
        handle: '.handler',
        onSort({ to }) {
            const groupIds = Array.from(to.children).map(item => item.getAttribute('group-id'))
            @this.reorderGroups(groupIds);
        }
    })">

        @if ($submenus = $this->menus)
            @foreach ($submenus as $item)
                {{-- @if (data_get($this->stepMenus, $item->id)) --}}
                <ul class="flex space-x-3 flex-col mx-6" group-id="{{ data_get($item, 'id') }}">
                    <li class="flex flex-col py-1" title="{{ data_get($item, 'sub_menu.description') }}">
                        <div class="relative  flex items-center justify-between border-b-2 handler cursor-move">
                            <div class="flex h-5 items-center">
                                <span id="menus-{{ $item->id }}"
                                    class="h-4 w-4 rounded  border-gray-300 bg-indigo-600 flex items-center justify-center">
                                    <x-tall::icons.outline.check class="h-5 w-5 text-white font-bold" />
                                </span>
                                <div class="ml-3 text-sm">
                                    <span
                                        class="font-medium text-gray-700 ">( {{ data_get($item, 'ordering') }}  )  - {{ data_get($item, 'sub_menu.name') }}</span>
                                    <span id="menu-description-{{ $item->id }}" class="text-gray-500">
                                        <span class="text-gray-500 font-bold">
                                            @if (data_get($item, 'sub_menu.slug'))
                                               ( {{ data_get($item, 'sub_menu.slug') }} )
                                            @endif
                                            @if (data_get($item, 'sub_menu.link'))
                                              (  {{ data_get($item, 'sub_menu.link') }} )
                                            @endif
                                        </span>
                                    </span>

                                </div>
                            </div>
                        </div>
                        @if ($sub_menus = $item->sub_menus)
                            @if ($sub_menus->count())
                                @livewire('tall::landlord.operacional.tenants.items-component', ['model' => $model, 'menu' => $menu, 'submenu' => $item], key($item->id))
                            @endif
                        @endif
                    </li>
                </ul>
                {{-- @endif --}}
            @endforeach
        @endif
    </li>
</ul>
