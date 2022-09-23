@if ($stepMenus = data_get($data, 'sub_menus'))
    @if ($menus = $this->menus)
        @foreach ($menus as $menu)
            <ul class="flex">
                <li class="flex flex-col relative text-center space-y-3  w-full">
                    <div class="bg-blue-100 rounded-lg px-3 py-1 flex items-center justify-between">
                        <span>{{ $menu->name }}</span>
                    </div>
                    @if ($submenus = $menu->sub_menus)
                        @foreach ($submenus as $item)
                            @if (data_get($stepMenus, $item->id))
                                <ul class="flex space-x-3 flex-col mx-6">
                                    <li class="flex flex-col">
                                        <div class="relative  flex items-center justify-between border-b-2">
                                            <div class="flex h-5 items-center">
                                                <input id="menus-{{ $item->id }}"
                                                    aria-describedby="menu-description-{{ $item->id }}"
                                                    type="checkbox" disabled checked value="{{ $item->id }}"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <div class="ml-3 text-sm">
                                                    <label for="menus-{{ $item->id }}"
                                                        class="font-medium text-gray-700 ">{{ $item->name }}</label>
                                                    <span id="menu-description-{{ $item->id }}"
                                                        class="text-gray-500">
                                                        <span class="sr-only">
                                                            {{ $item->slug }}</span>{{ $item->description }}</span>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="hidden w-3.5 h-3.5"></div>
                                        @if ($item->sub_menus->count())
                                            <ul class="flex ml-5  flex-col">
                                                @foreach ($item->sub_menus as $subitem)
                                                    @if (data_get($stepMenus, sprintf('%s.%s', $item->id, $subitem->id)))
                                                        <li class="flex relative">
                                                            <div class="relative flex items-start">
                                                                <div class="flex h-5 items-center">
                                                                    <input id="sub-menus-{{ $subitem->id }}"
                                                                        aria-describedby="sub-menu-description-{{ $subitem->id }}"
                                                                        type="checkbox" disabled checked
                                                                        value="{{ $subitem->id }}"
                                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                                </div>
                                                                <div class="ml-3 text-sm flex items-center space-x-2">
                                                                    <label for="sub-menus-{{ $subitem->id }}"
                                                                        class="font-medium text-gray-700">{{ $subitem->name }}</label>
                                                                    <span id="sub-menu-description-{{ $subitem->id }}"
                                                                        class="text-gray-500">
                                                                        <span
                                                                            class="text-sm text-gray-500 font-extrabold">(
                                                                            @if ($subitem->slug)
                                                                                {{ $subitem->slug }}
                                                                            @else
                                                                                {{ $subitem->link }}
                                                                            @endif )
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
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
@endif
