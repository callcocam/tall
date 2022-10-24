<input wire:model.defer="{{ $key }}" class="{{ $class }}" type="{{ $type }}"
    id="{{ $id }}" @isset($readonly)
readonly
@endisset
    @isset($placeholder)
placeholder="{{ $placeholder }}"
@endisset />
