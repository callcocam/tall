<div wire:key="{{ $name }}" class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6 items-center">
    <dt class="text-sm font-medium text-gray-500">{{ __($label) }}</dt>
    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
        <fieldset class="mt-4">
            <div class="space-x-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                @isset($options)
                    @foreach ($options as $value => $name)
                        <div class="flex items-center">
                            <input value="{{ $value }}" wire:model.defer="data.{{ $field }}"
                                id="{{ $field }}{{ $value }}" name="{{ $field }}"
                                type="{{ $type }}" class="{{ $class }}" />
                            <label for="{{ $field }}{{ $value }}"
                                class="ml-3 block text-sm font-medium text-gray-700">{{ __($name) }}</label>
                        </div>
                    @endforeach
                @endisset
            </div>
        </fieldset>
    </dd>
</div>
