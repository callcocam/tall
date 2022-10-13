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

if (request()->routeIs(data_get($data, 'slug'))):
    $defaltAttributes['class'] = 'group flex w-full items-center rounded-md py-2 pl-11 pr-2 text-sm font-medium bg-gray-200 text-gray-900';
else:
    $defaltAttributes['class'] = 'group flex w-full items-center rounded-md py-2 pl-11 pr-2 text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-200';
endif;

$slug = data_get($data, 'slug');
if (\Route::has($slug)):
    $defaltAttributes['href'] = route($slug);
else:
    if (data_get($data, 'link')):
        $defaltAttributes['href'] = data_get($data, 'link');
    else:
        $defaltAttributes['href'] = '';
    endif;
endif;
if (\Str::contains(data_get($data, 'link'), 'http')):
    $defaltAttributes['target'] = '_blank';
endif;
$name = data_get($data, 'name');
@endphp
<a {{ $attributes->merge($defaltAttributes) }}>
    <x-dynamic-component component="tall::icons.{{ $component }}" class="mr-1 h-4 w-4 flex-shrink-0 " />
    <span>
        {{ __($name) }}
    </span>
</a>
