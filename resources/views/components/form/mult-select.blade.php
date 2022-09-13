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
            <input x-on:focus="open = true" wire:model.debounce.500ms="filters.{{ $name }}" autocomplete="off"
                id="combobox-{{ $name }}" type="text" placeholder="{{ $selectedLabel }}"
                class="w-full rounded-md border border-gray-300 bg-white py-2 pl-3 pr-12 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm"
                role="combobox" aria-controls="options" :aria-expanded="open.toString()">
            <div class="absolute inset-y-0 right-0 flex items-center rounded-r-md px-2 space-x-2 focus:outline-none">
                <button type="button" x-on:click="toggleDropdown"
                    class="flex items-center rounded-r-md focus:outline-none">
                    <x-tall::icons.outline.chevron-up-down class="h-5 w-5 text-gray-400" />
                </button>
                <button type="button" x-on:click="toggleModal" class="flex items-center rounded-md focus:outline-none">
                    <x-tall::icons.outline.plus class="h-5 w-5 text-gray-400" />
                </button>
            </div>
            <ul x-cloak x-show="open"
                class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                id="options-{{ $name }}" role="listbox">
                @if ($options)
                    @foreach ($options as $optLabel => $optValue)
                        <li            
                        class="relative select-none py-2 pl-3 pr-9 text-gray-900 hover:bg-indigo-500 hover:text-white" 
                            id="option-{{ $name }}-{{ $optValue }}" role="option"
                            tabindex="{{ $loop->index }}">
                            <label for="option-{{ $name }}-{{ $optValue }}-label" class="flex items-center w-full h-full  cursor-pointer">
                                @switch($type)
                                    @case(1)
                                        <img src="{{ data_get($data, $cover) }}" alt="{{ data_get($data, $cover) }}"
                                            class="h-6 w-6 flex-shrink-0 rounded-full">
                                    @break

                                    @case(2)
                                        <span class="inline-block h-2 w-2 flex-shrink-0 rounded-full bg-green-400"
                                            aria-hidden="true"></span>
                                    @break

                                    @default
                                        @if (in_array($optValue, $selected))
                                            <span class="flex items-center  pl-1.5 text-indigo-600">
                                                <x-tall::icons.outline.check class="h-5 w-5 " />
                                            </span>
                                        @endif
                                @endswitch
                                <span class="ml-3 truncate">
                                    <input class="hidden" id="option-{{ $name }}-{{ $optValue }}-label" value="{{$optValue}}" wire:model="{{ $key }}.{{$optValue}}" type="checkbox">
                                    {{ $optLabel }}
                                    <span class="sr-only"> is online</span>
                                </span>
                            </label>
                            @if (!in_array($optValue, $selected))
                                <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600">
                                    <x-tall::icons.outline.check class="h-5 w-5" />
                                </span>
                            @endif
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </dd>
</div>
