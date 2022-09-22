<div x-data="{ isSortable: true }">
    <header class="bg-gray-50 py-2  z-0">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 xl:flex xl:items-center xl:justify-between">
            @include('tall::landlord.operacional.menus.controllers')
        </div>
    </header>
    <main class="pt-4 pb-2">
        @switch($actionType)
            @case(1)
                @livewire('tall::landlord.operacional.menus.group.items.add-component', ['model' => $currentModel, 'showModal' => true], key(sprintf('add-%s', $currentModel->id)))
            @break

            @case(2)
                @livewire('tall::landlord.operacional.menus.group.items.edit-component', ['model' => $currentModel, 'showModal' => true], key(sprintf('edit-%s', $currentModel->id)))
            @break

            @case(3)
                @livewire('tall::landlord.operacional.menus.group.items.delete-component', ['model' => $currentModel, 'showModal' => true], key(sprintf('delete-%s', $currentModel->id)))
            @break

            @default
        @endswitch
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 relative">
            <div class="flex absolute justify-items-center items-center w-full top-0 right-0 bottom-0 left-0 py-5 inset-0 bg-gray-500 bg-opacity-75 transition-opacity  z-40 min-h-screen "
                wire:loading wire:target="showToggle">
                <div class="flex w-full">
                    <x-tall::icons.spinner class="h-8 w-8 mx-auto" name="arrows-expand" />
                </div>
            </div>
            @if ($menus = $this->menus)
                <div x-init="Sortablejs.create($el, {
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
                })"
                    class="divide-y divide-gray-200  rounded-lg bg-gray-100 p-2 shadow grid grid-cols-1 lg:grid-cols-2 sm:gap-4 sm:divide-y-0">
                    @foreach ($menus as $menu)
                        <div group-id="{{ $menu->id }}"
                            class="rounded-tl-lg rounded-tr-lg sm:rounded-tr-none group bg-white px-6 py-2 col-span-2 lg:col-span-1 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                            <div class="bg-gray-200  px-2 py-1">
                                {{-- <span
                                    class="absolute -top-2 -right-2 bg-blue-500 h-5 shadow-md text-white w-10 rounded-lg text-center flex justify-center items-center text-[10px]">{{ $menu->id }}</span> --}}
                                <div class="flex items-center justify-between  ring-white">
                                    <div class="handler flex items-center  cursor-move">
                                        <div class="pointer-events-none text-gray-300 group-hover:text-gray-400"
                                            aria-hidden="true">
                                            <x-tall::icons.solid.arrows-expand
                                                class="h-6 w-6  rounded-full group-hover:opacity-75"
                                                name="arrows-expand" />
                                            {{-- <x-dynamic-component :component="Ui::component('icon')"
                                                class="h-8 w-8  rounded-full group-hover:opacity-75"
                                                name="arrows-expand" /> --}}
                                        </div>
                                        <div class="rounded-lg text-lg inline-flex p-0 text-teal-700 flex-1">
                                            {{ $menu->name }}
                                        </div>
                                    </div>
                                    <div class="flex justify-end">
                                        @if (data_get($showToggle, $menu->id))
                                            <x-circle-button type="button" title="{{ __('Ver') }}" icon="eye"
                                                wire:click.prevent="showToggle('{{ $menu->id }}',null)" />
                                        @else
                                            <x-circle-button type="button" title="{{ __('Esconder') }}" icon="eye-off"
                                                wire:click.prevent="showToggle('{{ $menu->id }}','{{ $menu->id }}')" />
                                        @endif
                                        <x-circle-button type="button" title="{{ __('Add') }}" icon="plus"
                                            wire:click.prevent="showModalToggleManager('{{ $menu->id }}',1)" />
                                        <x-circle-button type="button" title="{{ __('Edit') }}" icon="pencil"
                                            wire:click.prevent="showModalToggleManager('{{ $menu->id }}',2)" />
                                        <x-circle-button type="button" title="{{ __('Trash') }}" icon="trash"
                                            wire:click.prevent="showModalToggleManager('{{ $menu->id }}',3)" />
                                        {{-- @livewire('tall::landlord.operacional.menus.group.items.add-component', ['model' => $menu], key(sprintf('add-%s', $menu->id)))
                                        @livewire('tall::landlord.operacional.menus.group.items.edit-component', ['model' => $menu], key(sprintf('edit-%s', $menu->id)))
                                        @livewire('tall::landlord.operacional.menus.group.items.delete-component', ['model' => $menu], key(sprintf('delete-%s', $menu->id))) --}}
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 px-4">
                                <p class="mt-2 text-sm text-gray-500">
                                    @if (data_get($showToggle, $menu->id))
                                        @livewire('tall::landlord.operacional.menus.items-component', ['model' => $model, 'menu' => $menu], key($menu->id))
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </main>
</div>
