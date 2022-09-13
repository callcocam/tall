<x-slot name="header">
    <x-tall-table.breadcrumbs url="{{ route($this->list) }}" label="{{ __('SubMenus') }}" />
    <x-tall-table.breadcrumbs url="#" label="{{ __('Listar') }}" />
</x-slot>
<div class="w-full">
    <div class="overflow-x-auto">
        <div class="min-w-screen min-h-screen bg-gray-100 flex  font-sans overflow-hidden">
            <div class="w-full">
                <div class="bg-white shadow-md rounded px-4">
                    <div class="sm:flex sm:items-center px-6 pt-6 pb-4">
                        <div class="sm:flex-auto">
                            <h1 class="text-xl font-semibold text-gray-900">{{ __('SubMenus') }}</h1>
                            @isset($description)
                                <p class="mt-2 text-sm text-gray-700">{{ $description }}</p>
                            @endisset
                        </div>
                        <div class="mt-4 sm:mt-0 sm:ml-16 flex items-center space-x-2">
                            <x-tall-table.filters.clear  :filters="$filters" />
                            <x-tall-table.search />
                            <x-tall-table.add href="{{ route($this->create) }}">
                                {{ __('Adicionar SubMenu') }}
                            </x-tall-table.add>
                        </div>
                    </div>
                    <table class="w-full table-auto">
                        <thead class="shadow-md rounded-t-sm">
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal rounded-t-md">
                                <th class="py-1 px-6 text-left  cursor-pointer">
                                    <div class="flex flex-col space-y-1">
                                        <x-tall-table.sort name="name">{{ __('Nome') }}</x-tall-table.sort>
                                        <x-tall-table.filters.select name="menu" :options="$this->menus" />
                                    </div>
                                </th>
                                <th class="py-1 px-6 text-left  cursor-pointer">
                                    <div class="flex flex-col space-y-1">
                                        <x-tall-table.sort name="name">{{ __('Parent') }}</x-tall-table.sort>
                                        <x-tall-table.filters.select name="parent" :options="$this->parents" />
                                    </div>
                                </th>
                                <th class="py-1 px-6 text-left">
                                     <x-tall-table.filters.status sort="1" />
                                </th>
                                <th class="py-3 px-6 text-center">#</th>
                            </tr>
                        </thead>
                        @if ($models->count())
                            <tbody class="text-gray-600 text-sm font-light">
                                @foreach ($models as $model)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left">
                                            {{ $model->name }}
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            {{ $model->slug }}
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <x-tall-table.status status="{{ $model->status }}" />
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <x-tall-table.actions :model="$model" />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="w-full p-2 space-x-3">
                                        {{ $models->links() }}
                                    </td>
                                </tr>
                            </tfoot>
                        @else
                            <tr>
                                <td colspan="3" class="w-full p-2 space-x-3">
                                    <x-tall-table.empty />
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
