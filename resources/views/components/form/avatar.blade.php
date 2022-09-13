<div wire:key="{{ $name }}" class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6 items-center">
    <dt class="text-sm font-medium text-gray-500">{{ __($label) }}</dt>
    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
        <div class="mt-1 flex items-center space-x-5" x-data="{}">
            <span class="inline-block h-12 w-12 overflow-hidden rounded-full bg-gray-100">
                @if (data_get($data, $field) instanceof \Illuminate\Http\UploadedFile)
                    <img src="{{ data_get($data, $field)->temporaryUrl() }}">
                @else
                    @if ($img = data_get($model, $field))
                        <img src="{{ \Storage::url($img) }}" alt="{{ $img }}">
                    @else
                        <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    @endif
                @endif

            </span>
            <input type="file" class="hidden" wire:model="{{ $key }}" x-ref="avatar" />
            <button x-on:click.prevent="$refs.avatar.click()" type="button"
                class="rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">{{ __('Change') }}</button>
        </div>
    </dd>
</div>
