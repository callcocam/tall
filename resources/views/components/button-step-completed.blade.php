@props(['step', 'label' => null])
<li class="relative md:flex md:flex-1">
    <!-- Completed Step -->
    <button type="button" class="group flex w-full items-center">
        <span class="flex items-center px-6 py-4 text-sm font-medium">
            <span
                class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-indigo-600 group-hover:bg-indigo-800">
                <!-- Heroicon name: solid/check -->
                <x-tall::icons.outline.check class="h-6 w-6 text-white" />
            </span>
            <span class="ml-4 text-sm font-medium text-gray-900"> {{ $label ?? $slot }}</span>
        </span>
    </button>

    <!-- Arrow separator for lg screens and up -->
    <div class="absolute top-0 right-0 hidden h-full w-5 md:block" aria-hidden="true">
        <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
            <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor"
                stroke-linejoin="round" />
        </svg>
    </div>
</li>
