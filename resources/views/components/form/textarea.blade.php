<div wire:key="{{ $name }}" class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6 items-center">
    <dt class="text-sm font-medium text-gray-500">{{ __($label) }}</dt>
    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
        <textarea rows="{{ $row }}" wire:model.defer="{{ $key }}" class="{{ $class }}"
            type="{{ $type }}" id="{{ $id }}"
            @isset($placeholder)
        placeholder="{{ $placeholder }}" 
@endisset></textarea>
    </dd>
</div>
