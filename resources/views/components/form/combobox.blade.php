@props(['name' => 'combobox', 'label' => null, 'options' => [], 'filters' => []])
<div wire:key="{{ $name }}" class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6 items-center">
    <div x-data="combobox(false, '{{ json_encode($options) }}')">
        @if ($label)
            <label for="combobox" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
        @endif
        <div class="relative mt-1">
            <input wire:model="filters.{{ $name }}"
                {{ $attributes->merge([
                    'id' => 'combobox',
                    'aria-controls' => 'combobox',
                    'role' => 'combobox',
                    'class' =>
                        'w-full rounded-md border border-gray-300 bg-white py-2 pl-3 pr-12 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm',
                ]) }}
                :aria-expanded="open.toString()"/>
            <button type="button" x-on:click="toggle"
                class="absolute inset-y-0 right-0 flex items-center rounded-r-md px-2 focus:outline-none">
                <!-- Heroicon name: mini/chevron-up-down -->
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                        clip-rule="evenodd" />
                </svg>
            </button>

            <ul x-show="open"
                class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                id="options-{{ $attributes->get('id') }}" role="listbox">
                <!--
          Combobox option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.
  
          Active: "text-white bg-indigo-600", Not Active: "text-gray-900"
        -->
                <template x-if="options" x-for="(option, index) in options">
                    <li x-if="option" :key="index"
                        class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900"
                        x-bind:id="index.toString()" role="option" tabindex="-1">
                        <div class="flex items-center">
                            <!-- Online: "bg-green-400", Not Online: "bg-gray-200" -->
                            <span class="inline-block h-2 w-2 flex-shrink-0 rounded-full bg-green-400"
                                aria-hidden="true"></span>
                            <!-- Selected: "font-semibold" -->
                            <span class="ml-3 truncate" x-text="option">
                                <span class="sr-only"> is online</span>
                            </span>
                        </div>

                        <!--
Checkmark, only display for selected option.

Active: "text-white", Not Active: "text-indigo-600"
-->
                        <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600">
                            <!-- Heroicon name: mini/check -->
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </li>
                </template>

                <!-- More items... -->
            </ul>
        </div>
    </div>
</div>
