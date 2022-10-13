<div wire:key="{{ $name }}" class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6 items-center">
    <dt class="text-sm font-medium text-gray-500">{{ __($label) }}</dt>
    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
        <div class="mt-1 flex rounded-md shadow-sm" x-data="{
            open: false,
            toggle() {
                this.open = !this.open
            }
        }">
            <div class="relative flex flex-grow items-stretch focus-within:z-10">
                <input
                    class="block w-full  rounded-none rounded-l-md border-gray-300 pl-2 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    type="{{ $type }}" id="{{ $id }}" readonly
                    value="{{ data_get($data, sprintf('data.%s', $modelName)) }}" placeholder="{{ $selectedLabel }}" />
            </div>
            <button x-on:click="toggle" type="button"
                class="relative -ml-px flex items-center space-x-2 rounded-r-md border border-gray-300 bg-gray-50 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                <x-dynamic-component :component="Ui::component('icon')" :name="$rightIcon" class="{{ $iconSize }} shrink-0" />
            </button>
            <x-tall-search>
                <div x-cloak @click.away="open=false" @close.stop="open=false"
                    class="mx-auto max-w-xl max-h-96 transform divide-y divide-gray-100 overflow-hidden rounded-xl bg-white shadow-2xl ring-1 ring-black ring-opacity-5 transition-all">
                    <div class="relative">
                        <x-tall-icons.outline.search
                            class="pointer-events-none absolute top-3.5 left-4 h-5 w-5 text-gray-400" />
                        <input type="text" wire:model.debounce.500ms="filters.{{ $name }}"
                            class="h-12 w-full border-0 bg-transparent pl-11 pr-4 text-gray-800 placeholder-gray-400 focus:ring-0 sm:text-sm"
                            placeholder="Search..." role="search-combobox" x-bind:aria-expanded="open.toString()"
                            aria-controls="options" />
                    </div>
                    <button type="button" x-on:click="toggle"
                        class="inline-flex items-center absolute top-2 right-3 rounded-full border border-transparent bg-transparent p-1 text-black shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:ring-offset-2">
                        <!-- Heroicon name: outline/plus -->
                        <x-tall-icons.outline.x class="h-4 w-4 shrink-0" />
                    </button>
                    @isset($options)
                        <ul id="simplesidebar" class="max-h-72 py-2 text-sm overscroll-contain text-gray-800 p-2 "
                            id="options" role="listbox">
                            <!-- Active: "bg-indigo-600 text-white" -->
                            @if ($options)
                                @foreach ($options as $optLabel => $optValue)
                                    <li {{-- :class="{ 'bg-indigo-600 text-white': list.id == {{ data_get($data, $field) }} }" --}}
                                        @if ($optValue == data_get($data, $name)) class="flex select-none px-4 py-2 cursor-default relative bg-indigo-500 text-white"
                                @else
                                class="flex select-none px-4 relative hover:bg-indigo-500 hover:text-white border-b" @endif
                                        id="{{ $optValue }}" role="option">
                                        <label for="{{ $name }}.{{ $optValue }}"
                                            class=" py-2 cursor-pointer w-full flex">
                                            <span class="block truncate">{{ $optLabel }}</span>
                                            <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600">
                                                <!-- Heroicon name: mini/check -->
                                                @if ($optValue == data_get($data, $name))
                                                    <x-tall-icons.outline.check class="h-5 w-5 text-white" />
                                                @endif
                                            </span>
                                            <input class="hidden" value="{{ $optValue }}"
                                                wire:model="{{ $key }}" type="radio" name="{{ $name }}"
                                                id="{{ $name }}.{{ $optValue }}">
                                        </label>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        @if (!count($options))
                            <!-- Empty state, show/hide based on command palette state -->
                            <p x-show="!lists.length" class="p-4 text-sm text-gray-500">{{ __('No people found.') }}</p>
                        @endif
                    @endisset
                    <!-- Results, show/hide based on command palette state -->

                </div>
            </x-tall-search>
        </div>
    </dd>
</div>
