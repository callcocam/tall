<div wire:key="{{ $name }}" class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6 items-center">
    <dt class="text-sm font-medium text-gray-500">{{ __($label) }}</dt>
    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" wire:ignore x-data="{}">
        <div  x-init="x_quill = new Quill($el, @js($options))
        x_quill.on('text-change', function() {
            $dispatch('quill-input', x_quill.root.innerHTML);
        })"
            x-on:quill-input.debounce.defer="@this.set('{{ $key }}', $event.detail)">
            {!! data_get($this->data, $name) !!}
        </div>
    </dd>
</div>
