<x-slot name="header">
    <x-tall-table.breadcrumbs url="{{ route($this->list) }}" label="{{ __('Tenant') }}" />
    <x-tall-table.breadcrumbs url="#" label="{{ $title }}" />
</x-slot>
<div class="w-full">
    <div class="overflow-x-auto">
        <div class="min-w-screen min-h-screen bg-gray-100 flex  font-sans overflow-hidden">
             @includeIf('landlord.operacional.tenants.show')
             @include('tall::landlord.operacional.tenants.copy-tenants')
        </div>
    </div>
</div>
