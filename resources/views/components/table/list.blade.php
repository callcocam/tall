@props(['title', 'routeCreate' => null, 'routeOrder' => null, 'filters' => null, 'description' => null])
<div {{ $attributes->class('w-full') }}>
    <div class="overflow-x-auto">
        <div class="min-w-screen min-h-screen bg-gray-100 flex  font-sans overflow-hidden">
            <div class="w-full">
                <div class="bg-white shadow-md rounded px-4">
                    <div class="sm:flex sm:items-center px-6 pt-6 pb-4">
                        <div class="sm:flex-auto">
                            <h1 class="text-xl font-semibold text-gray-900">{{ __($title) }}</h1>
                            @isset($description)
                                <p class="mt-2 text-sm text-gray-700">{{ $description }}</p>
                            @endisset
                        </div>
                        <div class="mt-4 sm:mt-0 sm:ml-16 flex items-center space-x-2">
                            @if ($filters)
                                <x-tall-table.filters.clear :filters="$filters" />
                            @endif
                            <x-tall-table.search />
                            @if (\Route::has($routeCreate))
                                <x-tall-table.add href="{{ route($this->create) }}">
                                    {{ __('Adicionar') }}
                                </x-tall-table.add>
                            @endif
                            @if (\Route::has($routeOrder))
                                    <x-tall-table.order href="{{ route($routeOrder) }}" >
                                        {{ __('Ordenar') }}
                                    </x-tall-table.order>
                            @endif
                            @isset($actions)
                                {{ $actions }}
                            @endisset
                        </div>
                    </div>
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
