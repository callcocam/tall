@props(['style'=>'outline', 'name'])
<x-dynamic-component component="tall::icons.{{ $style }}.{{ $name }}" {{ $attributes }} />