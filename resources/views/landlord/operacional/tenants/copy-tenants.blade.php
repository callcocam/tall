<div class="w-full ">
    <div class="bg-white shadow-md rounded">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $model->name }}</h3>
                {{-- <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and application.</p> --}}
            </div>
            <div class="border-t border-gray-200 p-5">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <nav aria-label="Progress">
                    <ol role="list"
                        class="divide-y divide-gray-300 rounded-md border border-gray-300 md:flex md:divide-y-0">
                        <!-- Completed Step -->

                        @if (data_get($data, 'tenant.step') == 0)
                            <x-tall-button-step-current step="01" label="{{ data_get($data, 'name') }}" />
                        @else
                            <x-tall-button-step step="01" label="{{ data_get($data, 'name') }}" />
                        @endif
                        @if (data_get($data, 'tenant.step') == 1)
                            <x-tall-button-step-current step="02" label="Dados de acesso" />
                        @else
                            <x-tall-button-step step="02" label="Dados de acesso" />
                        @endif
                        @if (data_get($data, 'tenant.step') == 2)
                            <x-tall-button-step-current step="03"
                                label="Selecione os menus" />
                        @else
                            <x-tall-button-step step="03" label="Selecione os menus" />
                        @endif
                        @if (data_get($data, 'tenant.step') == 3)
                                <x-tall-button-step-current step="04" label="Resultado" />
                            @else
                                <x-tall-button-step step="04" label="Resultado" />
                            @endif
                    </ol>
                </nav>
                <div class="py-5 relative">

                    <x-tall-loading wire:target="prevStep" />
                    <x-tall-loading wire:target="nextStep" />
                    <div class="bg-white shadow sm:rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="mt-3 text-sm flex justify-between mx-10">
                                <div>
                                    @if (data_get($data, 'tenant.step'))
                                        <button type="button" wire:click="prevStep"
                                            class="font-medium text-indigo-600 hover:text-indigo-500 flex items-center space-x-2">
                                            <x-tall-icons.outline.arrow-left class="h-6 w-6" />
                                            <span> {{ __('Voltar') }}</span>
                                        </button>
                                    @endif
                                </div>
                                <div>
                                    @if (data_get($data, 'tenant.step') <= 2)
                                        <button type="button" wire:click="nextStep"
                                            class="font-medium text-indigo-600 hover:text-indigo-500 flex items-center space-x-2">
                                            <span>{{ __('Proximo') }}</span>
                                            <x-tall-icons.outline.arrow-right class="h-6 w-6" />
                                        </button>
                                    @endif
                                </div>
                            </div>
                            <div class="mt-2 text-sm text-gray-500">
                                <fieldset class="space-y-5 relative">
                                    <x-tall-loading wire:target="showToggle" />
                                    @switch(data_get($data,'tenant.step'))
                                        @case(0)
                                            @include('tall::landlord.operacional.tenants.start')
                                        @break

                                        @case(1)
                                            @include('tall::landlord.operacional.tenants.access')
                                        @break

                                        @case(2)
                                            @include('tall::landlord.operacional.tenants.menus')
                                        @break

                                        @default
                                            @include('tall::landlord.operacional.tenants.end')
                                    @endswitch
                                </fieldset>
                            </div>
                            <div class="mt-3 text-sm flex justify-between mx-10">
                                <div>
                                    @if (data_get($data, 'tenant.step'))
                                        <button type="button" wire:click="prevStep"
                                            class="font-medium text-indigo-600 hover:text-indigo-500 flex items-center space-x-2">
                                            <x-tall-icons.outline.arrow-left class="h-6 w-6" />
                                            <span> {{ __('Voltar') }}</span>
                                        </button>
                                    @endif
                                </div>
                                <div>
                                    @if (data_get($data, 'tenant.step') <= 2)
                                        <button type="button" wire:click="nextStep"
                                            class="font-medium text-indigo-600 hover:text-indigo-500 flex items-center space-x-2">
                                            <span>{{ __('Proximo') }}</span>
                                            <x-tall-icons.outline.arrow-right class="h-6 w-6" />
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>