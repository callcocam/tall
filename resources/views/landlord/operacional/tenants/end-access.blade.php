@if ($roles = $this->roles)
    @foreach ($roles as $value)
        @if (data_get($stepAccess, $value->id))
            <div class="relative flex items-start">
                <div class="flex h-5 items-center">
                    <input id="{{ $value->id }}-access" aria-describedby="{{ $value->id }}-description-access"
                        disabled name="access" type="checkbox" checked
                        value="{{ $value->id }}"
                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                </div>
                <div class="ml-3 text-sm">
                    <label for="{{ $value->id }}-access"
                        class="font-medium text-gray-700">{{ $value->name }}</label>
                    <p id="{{ $value->id }}-description-access" class="text-gray-500">
                        {{ $value->description }}
                    </p>
                </div>
            </div>
        @endif
    @endforeach
@endif
