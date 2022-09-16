<h3 class="text-lg font-medium leading-6 text-gray-900">Selecione o
    tenant base
</h3>
<legend class="sr-only">Selecione o tenant base</legend>
@if ($tenants = $this->tenants)
    @foreach ($tenants as $value)
        <div class="relative flex items-start">
            <div class="flex h-5 items-center">
                <input id="{{ $value->id }}-tenant" aria-describedby="{{ $value->id }}-description" name="tenant"
                    type="radio" wire:model="data.tenant.stepTenant" value="{{ $value->id }}"
                    class="h-4 w-4 rounded-full border-gray-300 text-indigo-600 focus:ring-indigo-500">
            </div>
            <div class="ml-3 text-sm">
                <label for="{{ $value->id }}-tenant" class="font-medium text-gray-700">{{ $value->name }}</label>
                <p id="{{ $value->id }}-description" class="text-gray-500">
                    {{-- {!! $value->description !!} --}}
                </p>
            </div>
        </div>
    @endforeach
@endif
