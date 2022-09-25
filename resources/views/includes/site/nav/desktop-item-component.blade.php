@php
if (data_get($menu, 'sub_menu')) {
    $data = data_get($menu, 'sub_menu');
} elseif ($data = data_get($menu, 'parent_sub_menu')) {
    $data = data_get($menu, 'parent_sub_menu');
} else {
    $data = $menu;
}
@endphp
<div class="flex items-center">
    <a @if (\Route::has(data_get($data, 'slug'))) href="{{ route(data_get($data, 'slug')) }}"                 
    @else
        href="{{ data_get($data, 'link') }}"                  
            @if (\Str::contains(data_get($data, 'link'), 'http'))
            target="_blank" 
            @endif
        @endif
        class="outline-none focus:outline-none px-3 py-2 bg-white rounded-sm flex items-center h-16  hover:bg-gray-100">
        <span class="pr-1 font-semibold flex-1">{{ __(data_get($data, 'name')) }}</span>
    </a>
</div>
