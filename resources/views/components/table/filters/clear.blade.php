@if (array_filter($filters))
    <div>
        @foreach ($filters as $name => $filter)
            <span
                wire:key="{{$name}}"
                class="inline-flex items-center rounded-full bg-blue-100 py-0.5 pl-2.5 pr-1 text-sm font-medium text-blue-700">
                {{ __($name) }}
                <button type="button" wire:click="resetFilter('{{ $name }}')"
                    class="ml-0.5 inline-flex h-4 w-4 flex-shrink-0 items-center justify-center rounded-full text-blue-400 hover:bg-blue-200 hover:text-blue-500 focus:bg-blue-500 focus:text-white focus:outline-none">
                    <span class="sr-only">Remove large option</span>
                    <x-dynamic-component :component="Ui::component('icon')" class="h-2 w-2" name="x" />
                </button>
            </span>
        @endforeach
        <span
            class="inline-flex items-center rounded-full bg-blue-100 py-0.5 pl-2.5 pr-1 text-sm font-medium text-blue-700">
            {{ __('All') }}
            <button type="button" wire:click="resetFilters"
                class="ml-0.5 inline-flex h-4 w-4 flex-shrink-0 items-center justify-center rounded-full text-blue-400 hover:bg-blue-200 hover:text-blue-500 focus:bg-blue-500 focus:text-white focus:outline-none">
                <span class="sr-only">Remove large option</span>
                <x-dynamic-component :component="Ui::component('icon')" class="h-2 w-2" name="x" />
            </button>
        </span>
    </div>
@endif
