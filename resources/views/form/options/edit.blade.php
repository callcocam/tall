<div class="flex items-center px-4 py-4 sm:px-6">
    <div class="flex min-w-0 flex-1 items-center">
        <div class="px-4 grid grid-cols-1 md:grid-cols-6 gap-4 w-full">
            @foreach ($this->array_field as $key => $array_field)
                <div class="col-span-{{ $array_field->span }}">
                   {{ $array_field->setProp('key', sprintf('data.%s', $array_field->name))->horizontal()->with('data', [])->with('field', $array_field->name)->with('model', null) }}
                </div>
            @endforeach
        </div>
    </div>
    <div class="flex flex-col md:flex-row gap-1">
        <!-- Heroicon name: mini/chevron-right -->
        <x-button wire:click='submit' green label="EDIT" icon="pencil" />
        <x-button wire:click='delete' label="DELETE" icon="trash" red />
    </div>
</div>
