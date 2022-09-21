<x-slot name="header">
    <x-tall-table.breadcrumbs url="{{ route($this->list) }}" label="{{ __('Tenant') }}" />
    <x-tall-table.breadcrumbs url="#" label="{{ $title }}" />
</x-slot>
<div class="w-full">
    <div class="overflow-x-auto">
        <div class="min-w-screen min-h-screen bg-gray-100 flex  font-sans overflow-hidden">
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
                                    <x-tall::button-step-completed step="00" label="Tenant criado" />
                                    @if (data_get($data, 'tenant.stepTenant'))
                                        <x-tall::button-step-completed step="01"
                                            label="Tenant base para copiar " />
                                    @else
                                        @if (data_get($this->current_step, 'stepTenant'))
                                            <x-tall::button-step-next step="01"
                                                label="Selecione o tenant base para copiar os dados base" />
                                        @else
                                            <x-tall::button-step step="01" label="Tenant base para copiar " />
                                        @endif
                                    @endif
                                    @if (data_get($data, 'tenant.stepAccess'))
                                        <x-tall::button-step-completed step="02" label="dados de acesso copiado" />
                                    @else
                                        @if (data_get($data, 'tenant.step') == 2)
                                            <x-tall::button-step-current step="02" label="Dados de acesso copiados" />
                                        @else
                                            <x-tall::button-step step="02" label="Dados de acesso copiados" />
                                        @endif
                                    @endif
                                    @if (data_get($data, 'tenant.stepMenus'))
                                        <x-tall::button-step-completed step="03" label="Dados de menu copiados" />
                                    @else
                                        @if (data_get($data, 'tenant.step') == 3)
                                            <x-tall::button-step-current step="03"
                                                label="Selecione os menus para copiar" />
                                        @else
                                            <x-tall::button-step step="03"
                                                label="Selecione os menus para copiar" />
                                        @endif
                                    @endif
                                    @if (data_get($data, 'tenant.stepFinished'))
                                        <x-tall::button-step-completed step="04" label="dados de acesso copiado" />
                                    @else
                                        @if (data_get($data, 'tenant.step') == 4)
                                            <x-tall::button-step-current step="04" label="Resultado" />
                                        @else
                                            <x-tall::button-step step="04" label="Resultado" />
                                        @endif
                                    @endif
                                </ol>
                            </nav>
                            <div class="py-5">
                                <div class="bg-white shadow sm:rounded-lg">
                                    <div class="px-4 py-5 sm:p-6">
                                        <div class="mt-2 text-sm text-gray-500">
                                            <fieldset class="space-y-5">
                                                @switch(data_get($data,'tenant.step'))
                                                    @case(0)
                                                        @include('tall::landlord.operacional.tenants.start')
                                                    @break

                                                    @case(1)
                                                        @include('tall::landlord.operacional.tenants.tenant')
                                                    @break

                                                    @case(2)
                                                        @include('tall::landlord.operacional.tenants.access')
                                                    @break

                                                    @case(3)
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
                                                        <x-tall::icons.outline.arrow-left class="h-6 w-6" />
                                                        <span> {{ __('Voltar') }}</span>
                                                    </button>
                                                @endif
                                            </div>
                                            <div>
                                                @if (data_get($data, 'tenant.step') <= 3)
                                                    <button type="button" wire:click="nextStep"
                                                        class="font-medium text-indigo-600 hover:text-indigo-500 flex items-center space-x-2">
                                                        <span>{{ __('Proximo') }}</span>
                                                        <x-tall::icons.outline.arrow-right class="h-6 w-6" />
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
        </div>
    </div>
</div>
