<div class="flex w-full space-x-2 p-2">
    <div class="px-4 grid grid-cols-1 md:grid-cols-6 gap-4 w-full">
        @foreach ($this->array_field as $key => $array_field)
        <div class="col-span-{{ $array_field->span }}">
                {{ $array_field->setProp('key', sprintf('data.options.%s', $array_field->name))->horizontal()->with('data', [])->with('field', $array_field->name)->with('model', null) }}
            </div>
        @endforeach
    </div>
    <div>
        <x-button wire:click='add' label="ADD" icon="plus" />
    </div>
</div>
