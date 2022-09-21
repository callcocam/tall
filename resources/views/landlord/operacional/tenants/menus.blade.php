<h3 class="text-lg font-medium leading-6 text-gray-900">Selecione os menus base
</h3>
<legend class="sr-only">Selecione os menus base</legend>
@if ($menus = $this->menus)
    @foreach ($menus as $menu)
        <ul class="flex">
            <li class="flex flex-col relative text-center space-y-3">
                <div class="bg-blue-100 rounded-lg p-3">{{ $menu->name }}</div>
                @if ($submenus = $menu->sub_menus)
                    @foreach ($submenus as $item)
                        <ul class="flex space-x-3 flex-col">
                            <li class="flex flex-col">
                                <div class="relative flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="menus-{{ $item->id }}"
                                            aria-describedby="menu-description-{{ $item->id }}" type="checkbox"
                                            wire:model="data.tenant.stepMenus.{{ $item->id}}" value="{{ $item->id }}"
                                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="menus-{{ $item->id }}"
                                            class="font-medium text-gray-700">{{ $item->name }}</label>
                                        <span id="menu-description-{{ $item->id }}" class="text-gray-500">
                                            <span class="sr-only">
                                                {{ $item->slug }}</span>{{ $item->description }}</span>
                                    </div>
                                </div>
                                @if ($subitems = $item->sub_menus)
                                    <ul class="flex ml-5  flex-col">
                                        @foreach ($subitems as $subitem)
                                            <li class="flex relative">
                                                <div class="relative flex items-start">
                                                    <div class="flex h-5 items-center">
                                                        <input id="sub-menus-{{ $subitem->id }}"
                                                            aria-describedby="sub-menu-description-{{ $subitem->id }}"
                                                            type="checkbox"
                                                            wire:model="data.tenant.stepMenus.{{ $item->id}}.{{ $subitem->id}}" value="{{ $subitem->id }}"
                                                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="sub-menus-{{ $subitem->id }}"
                                                            class="font-medium text-gray-700">{{ $subitem->name }}</label>
                                                        <span id="sub-menu-description-{{ $subitem->id }}"
                                                            class="text-gray-500">
                                                            <span class="sr-only">
                                                                {{ $subitem->slug }}</span>{{ $subitem->description }}</span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        </ul>
                    @endforeach
                @endif
            </li>
        </ul>
    @endforeach
@endif
