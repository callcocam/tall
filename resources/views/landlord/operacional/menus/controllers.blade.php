<div class="min-w-0 flex-1">
    <h1 class="mt-2 text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
        {{ $model->name }}</h1>
    <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-8">
        <div class="mt-2 flex items-center text-sm text-gray-500 space-x-2">
            <!-- Heroicon name: mini/briefcase -->
            <x-tall::icons.outline.briefcase class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" />
            <span> Sub menus </span>
            <span>{{ $model->sub_menus->count() }}</span>
        </div>

        <div class="mt-2 flex items-center text-sm text-gray-500">
            <!-- Heroicon name: mini/calendar -->
            <x-tall::icons.outline.calendar class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" />
            {{ date_carbom_format($model->created_at)->format('D M Y') }}
        </div>
    </div>
</div>
<div class="mt-5 flex xl:mt-0 xl:ml-4">
    {{-- <span class="hidden sm:block">
        <x-button x-on:click="isSortable = !isSortable" type="button" label="{{ __('Edit') }}" icon="pencil" />
    </span>
    <span class="ml-3 hidden sm:block">
        <x-button red type="button" label="{{ __('Delete') }}" icon="trash" />
    </span> --}}
    <span class="ml-3 hidden sm:block">        
        @livewire('tall::landlord.operacional.menus.group.add-component',compact('model'), , key(sprintf('add-menu-%s', $model->id)))       
    </span>
</div>