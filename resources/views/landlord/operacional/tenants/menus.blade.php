<h3 class="text-lg font-medium leading-6 text-gray-900">Selecione os menus base
</h3>
<legend class="sr-only">Selecione os menus base</legend>
@if ($menus = $this->menus)
    @foreach ($menus as $menu)
        <ul class="flex">
            <li class="flex flex-col relative text-center space-y-3  w-full">
                <div class="bg-blue-100 rounded-lg px-3 py-1 flex items-center justify-between">
                    <span>{{ $menu->name }}</span>
                    @if (data_get($showToggle, $menu->id))
                        <x-circle-button type="button" title="{{ __('Ver') }}" icon="eye"
                            wire:click.prevent="showToggle('{{ $menu->id }}',null)" />
                    @else
                        <x-circle-button type="button" title="{{ __('Esconder') }}" icon="eye-off"
                            wire:click.prevent="showToggle('{{ $menu->id }}','{{ $menu->id }}')" />
                    @endif
                </div>
                @if ($submenus = $menu->sub_menus)
                    @foreach ($submenus as $item)
                        @if (data_get($showToggle, $menu->id))
                            <ul class="flex space-x-3 flex-col mx-6">
                                <li class="flex flex-col">
                                    <div class="relative  flex items-center justify-between border-b-2">
                                        <div class="flex h-5 items-center">
                                            <input id="menus-{{ $item->id }}"
                                                aria-describedby="menu-description-{{ $item->id }}" type="checkbox"
                                                wire:model="data.sub_menus.{{ $item->id }}"
                                                value="{{ $item->id }}"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <div class="ml-3 text-sm">
                                                <label for="menus-{{ $item->id }}"
                                                    class="font-medium text-gray-700 ">{{ $item->name }}</label>
                                                <span id="menu-description-{{ $item->id }}" class="text-gray-500">
                                                    <span class="sr-only">
                                                        {{ $item->slug }}</span>{{ $item->description }}</span>

                                            </div>
                                        </div>
                                        @if ($item->sub_menus->count())
                                            @if (data_get($showToggle, sprintf('%s.%s', $menu->id, $item->id)))
                                                <button type="button" title="{{ __('Ver') }}"
                                                    wire:click.prevent="showToggle('{{ $menu->id }}.{{ $item->id }}',null)">
                                                    <x-tall-icons.outline.eye
                                                        class="pointer-events-none h-5 w-5 text-blue-900" />
                                                </button>
                                            @else
                                                <button type="button" title="{{ __('Esconder') }}"
                                                    wire:click.prevent="showToggle('{{ $menu->id }}.{{ $item->id }}','{{ $item->id }}')">
                                                    <x-tall-icons.outline.eye-off
                                                        class="pointer-events-none h-5 w-5 text-red-900" />
                                                </button>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="hidden w-3.5 h-3.5"></div>
                                    @if ($item->sub_menus->count())
                                        @if (data_get($showToggle, sprintf('%s.%s', $menu->id, $item->id)))
                                            <ul class="flex ml-5  flex-col">
                                                @foreach ($item->sub_menus as $subitem)
                                                    <li class="flex relative">
                                                        <div class="relative flex items-start">
                                                            <div class="flex h-5 items-center">
                                                                <input id="sub-menus-{{ $subitem->id }}"
                                                                    aria-describedby="sub-menu-description-{{ $subitem->id }}"
                                                                    type="checkbox"
                                                                    wire:model="data.sub_menus.{{ $item->id }}.{{ $subitem->id }}"
                                                                    value="{{ $subitem->id }}"
                                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                            </div>
                                                            <div class="ml-3 text-sm flex items-center space-x-2">
                                                                <label for="sub-menus-{{ $subitem->id }}"
                                                                    class="font-medium text-gray-700">{{ $subitem->name }}</label>
                                                                <span id="sub-menu-description-{{ $subitem->id }}"
                                                                    class="text-gray-500">
                                                                    <span class="text-sm text-gray-500 font-extrabold">(
                                                                        @if ($subitem->slug)
                                                                            {{ $subitem->slug }}
                                                                        @else
                                                                            {{ $subitem->link }}
                                                                        @endif )</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    @endif
                                </li>
                            </ul>
                        @endif
                    @endforeach
                @endif
            </li>
        </ul>
    @endforeach
@endif
