@php
if (data_get($item, 'sub_menu')) {
    $data = data_get($item, 'sub_menu');
} elseif ($data = data_get($item, 'parent_sub_menu')) {
    $data = data_get($item, 'parent_sub_menu');
} else {
    $data = $item;
}
@endphp
<li class="px-3 py-3 hover:bg-gray-100">
    <a @if (\Route::has(data_get($data, 'slug'))) href="{{ route(data_get($data, 'slug')) }}"                 
    @else
        href="{{ data_get($data, 'link') }}"                  
    @if (\Str::contains(data_get($data, 'link'), 'http'))
    target="_blank" @endif
        @endif
        >{{ __(data_get($data, 'name')) }}</a>
</li>
