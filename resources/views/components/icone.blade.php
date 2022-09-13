@props(['label ','selected'=>null, 'options' => [], 'selectedLabel' => 'Selecione um item', 'id' => uniqId()])
<div x-data="{
    openIcon: true,
    toggleDropdown() {
        this.openIcon = !this.openIcon
    },
}" x-init="toggleDropdown">
    <label for="combobox-label" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <div class="relative mt-1">
        <input x-on:focus="openIcon = true" wire:model.debounce.500ms="filters.icone" autocomplete="off" id="combobox-tall::icone"
            type="text" placeholder="{{ $selectedLabel }}"
            class="w-full rounded-md border border-gray-300 bg-white py-2 pl-3 pr-12 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm"
            role="combobox" aria-controls="options" :aria-expanded="openIcon.toString()" aria-expanded="false">
        <div class="absolute inset-y-0 right-0 flex items-center rounded-r-md px-2 space-x-2 focus:outline-none">
            <button type="button" x-on:click="toggleDropdown"
                class="flex items-center rounded-r-md focus:outline-none">
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <ul x-show="openIcon"
            class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
            id="options-icone" role="listbox">
            @if ($options)
                @foreach ($options as $key => $value)
                    <li x-on:click="toggleDropdown"
                        class="relative select-none pl-3 pr-9 text-gray-900 hover:bg-indigo-500 hover:text-white"
                        id="option-icone-{{ $id }}-{{ $key }}" role="option"
                        tabindex="{{ $loop->index }}">
                        <label for="{{ $id }}-icone-{{ $key }}"
                            class="flex items-center py-2 cursor-pointer">
                            <span class="flex items-center  pl-1.5 text-indigo-600">
                                @if (\View::exists(sprintf('components.icons.outline.%s', $key)))
                                    <x-dynamic-component component="icons.outline.{{ $key }}"
                                        class="mr-3 h-6 w-6 flex-shrink-0 text-gray-400 " />
                                @elseif(\View::exists(sprintf('components.icons.solid.%s', $key)))
                                    <x-dynamic-component component="icons.solid.{{ $key }}"
                                        class="mr-3 h-6 w-6 flex-shrink-0 text-gray-400 " />
                                @endif
                            </span>
                            <span class="ml-3 truncate ">
                                {{ $value }}
                            </span>
                            <input class="hidden" wire:model="data.icone" type="radio" value="{{ $key }}"
                                id="{{ $id }}-icone-{{ $key }}" />
                            @if ($key == $selected)
                                <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600">
                                    <x-tall::icons.outline.check class="h-5 w-5 text-indigo-600" />
                                </span>
                            @endif
                        </label>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
