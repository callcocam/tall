@props(['name' => 'combobox', 'label' => null, 'options' => [], 'filters' => []])
<select
    {{ $attributes->merge([
        'class' =>
            'block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm',
    ]) }}
    wire:model="filters.{{ $name }}">
    @if ($options)
        <option value="">
            {{ __('--Tudo--') }}
        </option>
        @foreach ($options as $value => $option)
            <option value="{{ $value }}">
                {{ $option }}
            </option>
        @endforeach
    @else
        {{ $slot }}
    @endif
</select>
