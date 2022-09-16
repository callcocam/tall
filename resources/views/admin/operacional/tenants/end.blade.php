@if ($tenantCopy = data_get($data, 'tenant'))
    <h3 class="text-lg font-medium leading-6 text-gray-900">Processo finalizado para esse tenant {{ data_get($data, 'name') }}
        {{ data_get($data, 'name') }}
    </h3>
    <legend class="sr-only">Processo finalizado para esse tenant</legend>
    <div class="overflow-hidden bg-white shadow sm:rounded-lg w-full flex flex-col">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Detalhes da copia</h3>
        </div>
        <div class="border-t border-gray-200 w-full flex">
            <dl class=" flex flex-col w-full">
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Tenant</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">  {{ data_get($data, 'name') }}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">{{ __("Acessos copiados")}}</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">@if($stepAccess = data_get($data, 'tenant.stepAccess'))  {{ count($stepAccess) }} @endif</dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">{{ __("Menus copiados")}}</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">  @if($stepMenus = data_get($data, 'tenant.stepMenus'))  {{ count($stepMenus) }} @endif</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">{{ __("Jão foi finalizado")}}</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">  {{ data_get($data, 'tenant.stepFinished') }}</dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">{{ __("Corrente Step")}}</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">  {{ data_get($data, 'tenant.step') }}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Status</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">  {{ data_get($data, 'tenant.published') }}</dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">{{ __('Descrição')}}</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">  {{ data_get($data, 'tenant.description') }}</dd>
                </div>
            </dl>
        </div>
    </div>
@endif
