<div {{ $attributes->merge(['class' => 'flex absolute justify-items-center items-center w-full top-0 right-0 bottom-0 left-0 py-5 inset-0 bg-gray-500 bg-opacity-75 transition-opacity  z-40 min-h-screen']) }}
    wire:loading>
    <div class="flex w-full">
        <x-tall-icons.spinner class="h-8 w-8 mx-auto" name="arrows-expand" />
    </div>
</div>
