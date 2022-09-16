@props(['step', 'label' => null])
<li class="relative md:flex md:flex-1">
    <!-- Current Step -->
    <button type="button" class="flex items-center px-6 py-4 text-sm font-medium" aria-current="step">
        <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-indigo-600">
            <span class="text-indigo-600">{{$step}}</span>
        </span>
        <span class="ml-4 text-sm font-medium text-indigo-600"> {{ $label ?? $slot }}</span>
    </button>

    <!-- Arrow separator for lg screens and up -->
    <div class="absolute top-0 right-0 hidden h-full w-5 md:block" aria-hidden="true">
        <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
            <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor"
                stroke-linejoin="round" />
        </svg>
    </div>
</li>
