<h3 class="text-lg font-medium leading-6 text-gray-900">Selecione os acessos base
</h3>
<legend class="sr-only">Selecione os acessos base</legend>
@if ($roles = $this->roles)
    @foreach ($roles as $value)
        <div class="relative flex items-start">
            <div class="flex h-5 items-center">
                <input id="{{ $value->id }}-access" aria-describedby="{{ $value->id }}-description-access" name="access"
                    type="checkbox" wire:model="data.tenant.stepAccess.{{ $value->id}}" value="{{ $value->id }}"
                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
            </div>
            <div class="ml-3 text-sm">
                <label for="{{ $value->id }}-access" class="font-medium text-gray-700">{{ $value->name }}</label>
                <p id="{{ $value->id }}-description-access" class="text-gray-500">
                    {{ $value->description }}
                </p>
            </div>
        </div>
    @endforeach
@endif
