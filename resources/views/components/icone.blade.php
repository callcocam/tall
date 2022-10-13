@props(['label ', 'selected' => null, 'options' => [], 'selectedLabel' => 'Selecione um item', 'id' => uniqId()])
<div x-data="{}">
    <label for="combobox-label" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <div class=" mt-1">
        <div class="relative flex items-center">
            <input wire:model.debounce.500ms="filters.icone" autocomplete="off" id="combobox-label" type="text"
                placeholder="{{ $selectedLabel }}"
                class="w-full rounded-md border border-gray-300 bg-white py-2 pl-3 pr-12 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm" />

            <x-tall-icons.outline.search class="h-5 w-5 absolute right-2 top-2" />
        </div>
        <ul class="mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base sm:text-sm mb-3" id="options-icone"
            role="listbox">
            @if ($options)
                @foreach ($options as $key => $value)
                    <li class="select-none pl-3 text-gray-900" id="option-icone-{{ $id }}-{{ $key }}"
                        role="option" tabindex="{{ $loop->index }}">
                        <label for="{{ $id }}-icone-{{ $key }}"
                            class="flex items-center justify-between py-2 cursor-pointer hover:bg-gray-50 hover:text-gray-500">
                            <div class="flex items-center">
                                <span class="flex items-center  pl-1.5 text-gray-600">
                                    @if (\View::exists(sprintf('tall::components.icons.outline.%s', $key)))
                                        <x-dynamic-component component="tall::icons.outline.{{ $key }}"
                                            class="h-5 w-5" />
                                    @elseif(\View::exists(sprintf('tall::components.icons.solid.%s', $key)))
                                        <x-dynamic-component component="tall::icons.solid.{{ $key }}"
                                            class="h-5 w-5" />
                                    @endif
                                </span>
                                <span class="ml-3 truncate ">
                                    {{ $value }}
                                </span>
                            </div>
                            <input class="hidden" wire:model="data.icone" type="radio" value="{{ $key }}"
                                id="{{ $id }}-icone-{{ $key }}" />
                            @if ($key == $selected)
                                <span class="inset-y-0 flex items-center  text-indigo-600">
                                    <x-tall-icons.outline.check class="h-5 w-5 text-indigo-600" />
                                </span>
                            @endif
                        </label>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
