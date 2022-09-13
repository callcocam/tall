@props(['icon' => 'pencil', 'maxWidth' => 'xl'])
<div x-data="{ open: @entangle('showModal') }">
    @isset($actions)
        {{ $actions }}
    @else
        @isset($buttonCircle)
            <x-circle-button type="button"
                @isset($title)
                 title="{{ __($title) }}"
            @endisset
                icon="{{ $icon }}" wire:click="showModalToggle" />
        @else
            <x-button type="button"
                @isset($title)
                 title="{{ __($title) }}"
            @endisset
                icon="{{ $icon }}" wire:click="showModalToggle" />
            @endif
        @endisset
        <form
            {{ $attributes->merge([
                'class' => 'relative z-10',
                'aria-labelledby' => 'modal-title',
                'role' => 'dialog',
                'aria-modal' => 'true',
            ]) }}>
            <div x-show="open" x-transition:enter="eease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                x-description="Background backdrop, show/hide based on modal state."
                class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" x-cloak></div>

            <div x-show="open" x-transition:enter="eease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                x-description="Background backdrop, show/hide based on modal state."
                class="fixed inset-0 overflow-y-auto z-50" x-cloak>
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-2 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-{{ $maxWidth }} sm:p-6">
                        <div>
                            <div class="mt-2">
                                <div class="shadow sm:overflow-hidden sm:rounded-md">
                                    <div class="space-y-2 bg-white py-4 px-4">
                                        @isset($header)
                                            <div class="pb-2 border-b-2  bg-white z-20">
                                                <h3 class="text-lg font-medium leading-6 text-gray-900">
                                                    {{ $header }}
                                                </h3>
                                            </div>
                                        @endisset
                                        <div class="max-h-[420px]  overflow-auto px-2 mb-4" x-data="" x-init="new SimpleBar($el)">
                                            {{ $slot }}
                                        </div>
                                        @isset($footer)
                                            <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                                                {{ $footer }}
                                            </div>
                                        @else
                                            <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3 bg-white z-20">
                                                <button type="submit"
                                                    class="flex space-x-1 items-center w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:col-start-2 sm:text-sm">
                                                    <x-tall::icons.outline.save class="h-5 w-5" />
                                                    <span>{{ __('Salvar') }}</span>
                                            </button>
                                                <button type="button" wire:click="showModalToggle"
                                                    class="mt-3 space-x-1 items-center flex w-full justify-center rounded-md border border-red-300 bg-white px-4 py-2 text-base font-medium text-red-700 shadow-sm hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:col-start-1 sm:mt-0 sm:text-sm">
                                                   <x-tall::icons.outline.ban class="h-5 w-5" />
                                                    <span>{{ __('Cancelar') }}</span>
                                                </button>
                                            </div>
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
