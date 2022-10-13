@props(['item', 'defaltAttributes' => []])
@php
if (data_get($item, 'sub_menu')) {
    $data = data_get($item, 'sub_menu');
} elseif ($data = data_get($item, 'parent_sub_menu')) {
    $data = data_get($item, 'parent_sub_menu');
} else {
    $data = $item;
}
if (\View::exists(sprintf('tall::components.icons.outline.%s', data_get($data, 'icone')))):
    $component = sprintf('outline.%s', data_get($data, 'icone'));
elseif (\View::exists(sprintf('tall::components.icons.solid.%s', data_get($data, 'icone')))):
    $component = sprintf('solid.%s', data_get($data, 'icone'));
else:
    $component = 'outline.chevron-right';
endif;
$name = data_get($data, 'name');
@endphp
<div class="space-y-1" x-data="sidebar(false)">
    <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
    <button type="button" x-on:click="toggle"
        :class="{
            'bg-gray-200 text-gray-900': open,
            'text-gray-600 hover:bg-gray-50 hover:text-gray-900': !(
                open)
        }"
        class=" group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium"
        aria-controls="sub-menu-{{ data_get($data, 'id') }} " {{-- x-bind:aria-expanded="open.toString()" --}}>
        <!-- Heroicon name: outline/users -->
        <x-dynamic-component component="tall::icons.{{ $component }}" class="mr-3 h-4 w-4 flex-shrink-0 " />
        <span class="flex-1 uppercase">{{ $name }} </span>
        <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
        <svg :class="{ 'text-gray-400 rotate-90': open, 'text-gray-300': !(open) }"
            class="text-gray-300 ml-3 h-4 w-4 flex-shrink-0 transform transition-colors duration-150 ease-in-out group-hover:text-gray-400"
            viewBox="0 0 20 20" aria-hidden="true">
            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
        </svg>
    </button>
    <!-- Expandable link section, show/hide based on state. -->
    <div class="space-y-1 bg-gray-50" id="sub-menu-{{ data_get($data, 'id') }} " x-show="open">
      {{ $slot }}
    </div>
</div>
