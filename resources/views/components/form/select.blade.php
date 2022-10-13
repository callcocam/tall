<div wire:key="{{ $name }}" class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6 items-center">
    <dt class="text-sm font-medium text-gray-500">{{ __($label) }}</dt>
    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
        <div class="relative mt-1" x-data="{
            open: false,
            toggleDropdown() {
                this.open = !this.open
            },
            toggleModal() {
        
            }
        }" @click.away="open=false" @close.stop="open=false">
            <input wire:model.defer="{{ $key }}" type="hidden">
            <input x-on:focus="open = true" wire:model.debounce.500ms="filters.{{ $name }}" autocomplete="off"
                id="combobox-{{ $name }}" type="text" placeholder="{{ $selectedLabel }}"
                class="w-full rounded-md border border-gray-300 bg-white py-2 pl-3 pr-12 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm"
                role="combobox" aria-controls="options" :aria-expanded="open.toString()">
            <div class="absolute inset-y-0 right-0 flex items-center rounded-r-md px-2 space-x-2 focus:outline-none">
                <button type="button" x-on:click="toggleDropdown"
                    class="flex items-center rounded-r-md focus:outline-none">
                    <x-tall-icons.outline.chevron-up-down class="h-5 w-5 text-gray-400" />
                </button>
                <button type="button" x-on:click="toggleModal" class="flex items-center rounded-md focus:outline-none">
                    <x-tall-icons.outline.plus class="h-5 w-5 text-gray-400" />
                </button>
            </div>
            <ul x-cloak x-show="open"
                class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                id="options-{{ $name }}" role="listbox">
                @if ($options)
                    @foreach ($options as $optLabel => $optValue)
                        <li @if ($optValue == data_get($data, $name)) class="relative cursor-default select-none py-2 pl-3 pr-9 bg-indigo-500 text-gray-100" 
                        @else                        
                        x-on:click="toggleDropdown"
                        wire:click="$set('{{ $key }}','{{ $optValue }}')"
                        class="relative cursor-pointer select-none py-2 pl-3 pr-9 text-gray-900 hover:bg-indigo-500 hover:text-white" @endif
                            id="option-{{ $name }}-{{ $optValue }}" role="option"
                            tabindex="{{ $loop->index }}">
                            <div class="flex items-center">
                                @switch($type)
                                    @case(1)
                                        <img src="{{ data_get($data, $cover) }}"
                                            alt="{{ data_get($data, $cover) }}" class="h-6 w-6 flex-shrink-0 rounded-full">
                                    @break

                                    @case(2)
                                        <span class="inline-block h-2 w-2 flex-shrink-0 rounded-full bg-green-400"
                                            aria-hidden="true"></span>
                                    @break

                                    @default
                                        @if ($optValue != data_get($data, $name))
                                            <span class="flex items-center  pl-1.5 text-indigo-600">
                                                <x-tall-icons.outline.check class="h-5 w-5 " />
                                            </span>
                                        @endif
                                @endswitch
                                <span class="ml-3 truncate">
                                    {{ $optLabel }}
                                    <span class="sr-only"> is online</span>
                                </span>
                            </div>
                            @if ($optValue == data_get($data, $name))
                                <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600">
                                    <x-tall-icons.outline.check class="h-5 w-5 text-white" />
                                </span>
                            @endif
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </dd>
</div>
