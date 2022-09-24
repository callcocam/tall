@props(['item', 'defaltAttributes'=>[]])
@php
if (data_get($item, 'sub_menu')) {
    $data = data_get($item, 'sub_menu');
} elseif ($data = data_get($item, 'parent_sub_menu')) {
    $data = data_get($item, 'parent_sub_menu');
} else {
    $data = $item;
}
$slug = data_get($data, 'slug');
if(\Route::has($slug)):
 $defaltAttributes['href'] = route($slug);
else:
 $defaltAttributes['href'] =  data_get($data, 'link');
endif;
if (\Str::contains(data_get($data, 'link'), 'http')):
    $defaltAttributes['target'] =  '_blank';
endif;
$name = data_get($data, 'name');
$icone = data_get($data, 'icone');
@endphp
<a {{ $attributes->merge($defaltAttributes)}}>{{ __(data_get($data, 'name')) }}</a>
