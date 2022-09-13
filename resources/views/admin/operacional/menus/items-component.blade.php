<div wire:id="{{ $menu->id }}-items" class="mt-1 text-sm text-gray-500 w-full pl-4 border-2 ">
    @if ($submenus = $this->sub_menus)
        <ul x-data="" group-id="{{ $menu->id }}" x-init="Sortablejs.create($el, {
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
        })" class="flex flex-col space-y-1">
            @foreach ($submenus as $submenu)
                <li menu-id="{{ $submenu->id }}"
                    class="flex flex-col  w-full pl-2 py-2 rounded-md cursor-move justify-end items-center space-x-2 relative">
                    <div class="flex ring-2 ring-gray-200 w-full p-1 rounded-sm handler">
                        <div class="flex ring-2 ring-gray-200 w-full p-1 rounded-sm handler">
                            {{-- <span
                                class="absolute -top-2 -left-2 bg-blue-500 h-5 shadow-md text-white w-10 rounded-lg text-center flex justify-center items-center text-[10px]">{{ $submenu->id }}</span> --}}
                            <x-dynamic-component :component="Ui::component('icon')" class="h-6 w-6  rounded-full group-hover:opacity-75"
                                name="arrows-expand" />
                            <span class="text-gray-800 font-bold">
                                {{ $submenu->name }}
                            </span>
                        </div>
                        @livewire('tall::admin.operacional.menus.group.items.add-component', ['model' => $submenu], key(sprintf('add-submenu-%s', $submenu->id)))
                        @livewire('tall::admin.operacional.menus.group.items.edit-component', ['model' => $submenu], key(sprintf('edit-submenu-%s', $submenu->id)))
                        @livewire('tall::admin.operacional.menus.group.items.delete-component', ['model' => $submenu], key(sprintf('delete-submenu-%s', $submenu->id)))
                    </div>
                    @if ($submenu->sub_menus->count())
                        @livewire('tall::admin.operacional.menus.items-component', ['model' => $model, 'menu' => $submenu], key($submenu->id))
                    @else
                        <ul x-data="" group-id="{{ $submenu->id }}" x-init="Sortablejs.create($el, {
                            animation: 150,
                            ghostClass: 'bg-yellow-100',
                            swap: true, // Enable swap plugin
                            swapClass: 'bg-green-200',
                            fallbackOnBody: true,
                            group: 'group',
                            onSort({ to }) {
                                const groupId = to.getAttribute('group-id');
                                const menuIds = Array.from(to.children).map(i => i.getAttribute('menu-id'))
                                @this.reorderItems({ groupId, menuIds });
                            }
                        })"
                            class="flex flex-col w-full pl-2 py-1 rounded-md cursor-move justify-end items-center space-x-2 relative">
                            <li>{{ __("Não tem sub menu(s)")}}</li>
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
</div>
