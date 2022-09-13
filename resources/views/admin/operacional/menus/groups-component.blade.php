<div x-data="{ isSortable: true }">
    <header class="bg-gray-50 py-2">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 xl:flex xl:items-center xl:justify-between">
            @include('tall::admin.operacional.menus.controllers')
        </div>
    </header>
    <main class="pt-4 pb-2">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
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
                            class="rounded-tl-lg rounded-tr-lg sm:rounded-tr-none relative group bg-white p-6 col-span-2 lg:col-span-1 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                            <div class=" cursor-move bg-gray-200 rounded-md p-2 relative">
                                {{-- <span
                                    class="absolute -top-2 -right-2 bg-blue-500 h-5 shadow-md text-white w-10 rounded-lg text-center flex justify-center items-center text-[10px]">{{ $menu->id }}</span> --}}
                                <div class="flex items-center justify-between  ring-4 ring-white">
                                    <div class="handler flex items-center">
                                        <div class="pointer-events-none text-gray-300 group-hover:text-gray-400"
                                            aria-hidden="true">
                                            <x-dynamic-component :component="Ui::component('icon')"
                                                class="h-8 w-8  rounded-full group-hover:opacity-75"
                                                name="arrows-expand" />
                                        </div>
                                        <div class="rounded-lg text-lg inline-flex p-3 text-teal-700 flex-1">
                                            {{ $menu->name }}  
                                        </div>
                                    </div>
                                    <div class="flex justify-end">
                                        @livewire('tall::admin.operacional.menus.group.items.add-component', ['model' => $menu], key(sprintf('add-%s', $menu->id)))
                                        @livewire('tall::admin.operacional.menus.group.items.edit-component', ['model' => $menu], key(sprintf('edit-%s', $menu->id)))
                                        @livewire('tall::admin.operacional.menus.group.items.delete-component', ['model' => $menu], key(sprintf('delete-%s', $menu->id)))
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 px-4">
                                <p class="mt-2 text-sm text-gray-500">
                                    @livewire('tall::admin.operacional.menus.items-component', ['model' => $model, 'menu' => $menu], key($menu->id))
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </main>
</div>
