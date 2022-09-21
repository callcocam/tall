<x-slot name="header">
    <x-tall-table.breadcrumbs url="{{ route($this->list) }}" label="{{ __('Menu') }}" />
    <x-tall-table.breadcrumbs url="#" label="{{ $title }}" />
</x-slot>
<div class="w-full">
    <div class="overflow-x-auto">
        <div class="min-w-screen min-h-screen bg-gray-100 flex  font-sans overflow-hidden">
            <div class="w-full">
                <div class="bg-white shadow-md rounded">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="border-t border-gray-200">
                            <div class="min-h-full">
                                <!-- Navbar -->
                                <nav class="bg-gray-50">
                                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                                        <div class="flex h-16 items-center justify-between border-b border-gray-200">

                                            <div class="flex flex-1 justify-center px-2 lg:ml-6 lg:justify-end">
                                                <!-- Search section -->
                                                <div class="w-full max-w-lg lg:max-w-xs">
                                                    <label for="search" class="sr-only">Search</label>
                                                    <div class="relative text-gray-400 focus-within:text-gray-500">
                                                        <x-tall::icons.outline.search class="h-5 w-5 absolute left-2 top-2.5" />
                                                        <input wire:model.debounce.500ms="filters.search"
                                                            class="block w-full rounded-md border border-gray-300 bg-white py-2 pl-8 pr-3 leading-5 text-gray-900 placeholder-gray-500 focus:border-purple-500 focus:placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-purple-500 sm:text-sm"
                                                            placeholder="Search" type="search" name="search">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                                @livewire('tall::landlord.operacional.menus.groups-component', compact('model', 'filters'), key(uniqid($model->id)))
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
