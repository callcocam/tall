@props(['step', 'label' => null])
<button type="button" class="group flex items-center">
    <span class="flex items-center px-6 py-4 text-sm font-medium">
        <span
            class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-gray-300 group-hover:border-gray-400">
            <span class="text-gray-500 group-hover:text-gray-900">{{ $step }}</span>
        </span>
        <span class="ml-4 text-sm font-medium text-gray-500 group-hover:text-gray-900"> {{ $label ?? $slot }}</span>
    </span>
</button>
