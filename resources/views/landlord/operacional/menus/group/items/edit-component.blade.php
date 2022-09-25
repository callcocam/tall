<x-tall-modal-form wire:submit.prevent="submit">
    <x-slot name="actions">
        {{-- <x-circle-button type="button" title="{{ __('Edit') }}" icon="pencil" wire:click="showModalToggle" /> --}}
    </x-slot>
    <x-errors />
    <x-slot name="header">
        @if ($name = data_get($model, 'sub_menu.name'))
            Alterar sub menu do: {{ $name }}
        @else
            Alterar o menu: {{ data_get($model, 'name') }}
        @endif
    </x-slot>

    {{-- @if ($showModal) --}}
        <div class="grid grid-cols-3 gap-2 my-3">
            <div class="col-span-3">
                <x-input label="{{ __('Nome Do Menu') }}" wire:model.lazy="data.name"
                    class="block w-full min-w-0 flex-grow rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
            </div>
            <div class="col-span-3">
                <x-input label="{{ __('Slug') }}" wire:model.lazy="data.slug"
                    class="block w-full min-w-0 flex-grow rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
            </div>
            <div class="col-span-3">
                <x-input label="{{ __('Link') }}" wire:model.lazy="data.link"
                    class="block w-full min-w-0 flex-grow rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
            </div>
            <div class="col-span-3">
                {{-- @include('tall::landlord.operacional.menus.icons') --}}
                <x-tall-icone field="icone" label="{{ __('Icone') }}" :options="$this->icons" :selectedLabel="data_get($data, 'icone')"
                    :selected="data_get($data, 'icone')" />
            </div>
            <div class="col-span-3">
                <x-toggle lg label="{{ __('Status') }}" wire:model="data.status" />
            </div>
            <div class="col-span-3">
                <label for="about" class="block text-sm font-medium text-gray-700">{{ __('Attributes') }}</label>
                <div class="mt-1">
                    <textarea wire:model.lazy="data.attributes"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        placeholder="{{ __('Attributes do menu') }}"></textarea>
                </div>
            </div>
            <div class="col-span-3">
                <label for="about" class="block text-sm font-medium text-gray-700">{{ __('Descrição') }}</label>
                <div class="mt-1">
                    <textarea wire:model.lazy="data.description"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        placeholder="{{ __('Descrição do menu') }}"></textarea>
                </div>
            </div>
        </div>
    {{-- @endif --}}
</x-tall-modal-form>
