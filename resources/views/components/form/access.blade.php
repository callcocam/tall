<div wire:key="{{ $name }}" class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6 items-center">
    <dt class="text-sm font-medium text-gray-500">{{ __($label) }}</dt>
    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 border p-2 rounded bg-white">
        <fieldset class="mt-4">
            @isset($options)
                <div class="relative w-full text-gray-400 focus-within:text-gray-600 mb-4">
                    <div class="pointer-events-none absolute inset-y-0 left-2 flex items-center">
                        <!-- Heroicon name: mini/magnifying-glass -->
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input wire:model.debounce.500ms="filters.{{ $field }}" id="search-{{ $field }}"
                        name="search-{{ $field }}"
                        class="block h-full w-full py-2 pl-8 pr-3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        placeholder="{{ __('Buscar...') }}" type="search"/>
                </div>
                <div class="space-y-2 max-h-52 overflow-auto relative p-4" x-data="" x-init="new SimpleBar($el)">
                    @foreach ($options as $name => $value)
                        <div class="flex uppercase">
                            <div class="h-5 items-center">
                                <input value="{{ $value }}"
                                    wire:model.defer="data.{{ $field }}.{{ $value }}"
                                    id="{{ $field }}{{ $value }}" name="{{ $field }}"
                                    type="{{ $type }}" class="{{ $class }}"/>
                            </div>
                            <div class="ml-2 text-sm">
                                <label for="{{ $field }}{{ $value }}"
                                    class="font-medium text-gray-700">{{ $name }}</label>
                                @isset($description)
                                    <p id="comments-description" class="text-gray-500">{{ $description }}</p>
                                @endisset
                            </div>
                        </div>
                    @endforeach
                </div>
            @endisset
        </fieldset>
    </dd>
</div>
