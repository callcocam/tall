@props([
    'sort' => 0,
    'name' => 'status',
    'label' => null,
    'options' => [
        '0' => 'Desabilitado',
        '1' => 'Habiitado',
    ],
    'filters' => [],
])
<div class="flex flex-col space-y-1 {{ $sort ? 'cursor-pointer':'' }}">
    @if($sort)
        <x-tall-table.sort name="{{ $name }}"> {{ __('Status') }}</x-tall-table.sort>
    @else
        <label for="{{ $name }}"> {{ __('Status') }}</label>
    @endisset
{{--    <select--}}
{{--        {{ $attributes->merge([--}}
{{--            'class' =>--}}
{{--                'block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm',--}}
{{--        ]) }}--}}
{{--        @if ($options) wire:model="filters.{{ $name }}">--}}
{{--            <option value="">--}}
{{--                {{ __('Todos') }}--}}
{{--            </option>--}}
{{--            @foreach ($options as $value => $option)--}}
{{--                <option value="{{ $value }}">--}}
{{--                    {{ $option }}--}}
{{--                </option>--}}
{{--            @endforeach--}}
{{--        @else--}}
{{--            {{ $slot }} @endif--}}
{{--        </select>--}}

</div>
