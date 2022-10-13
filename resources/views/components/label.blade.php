@props(['label'=>null, 'hasError'=>null])
<label {{ $attributes->class([
    'block text-sm font-medium',
    'text-red-600'  => $hasError,
    'opacity-60'         => $attributes->get('disabled'),
    'text-gray-700 dark:text-gray-400' => !$hasError,
]) }}>
{{ $label ?? $slot }}
</label>