@props(['options'])
<div>
    <label for="search" class="sr-only">Search</label>
    <div class="relative mt-1 rounded-md shadow-sm">
        <select wire:model.debounce.500ms="filters.perPage"
            class="block w-full rounded-md border-gray-300   focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
            placeholder="{{ __('Per page...') }}">
            @foreach ($options as $value)
                <option value="{{ $value }}">{{ $value }}</option>
            @endforeach
        </select>

    </div>
</div>
