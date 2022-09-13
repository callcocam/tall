<x-slot name="header">
    <x-tall-table.breadcrumbs url="{{ route($this->list) }}" label="{{ __('Usuários') }}" />
    <x-tall-table.breadcrumbs url="#" label="{{ __('Listar') }}" />
</x-slot>
<div class="w-full">
    <div class="overflow-x-auto">
        <div class="min-w-screen min-h-screen bg-gray-100 flex  font-sans overflow-hidden">
            <div class="w-full">
                <div class="bg-white shadow-md rounded px-4">
                    <div class="sm:flex sm:items-center px-6 pt-6 pb-4">
                        <div class="sm:flex-auto">
                            <h1 class="text-xl font-semibold text-gray-900">{{ __('Permissões') }}</h1>
                            @isset($description)
                                <p class="mt-2 text-sm text-gray-700">{{ $description }}</p>
                            @endisset
                        </div>
                        <div class="mt-4 sm:mt-0 sm:ml-16 flex items-center space-x-2">
                            <x-table.filters.clear  :filters="$filters" />
                            <x-table.search />
                            <x-table.add href="{{ route($this->create) }}">
                                {{ __('Adicionar User') }}
                            </x-table.add>
                        </div>
                    </div>
                    <table class="w-full table-auto">
                        <thead class="shadow-md rounded-t-sm">
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal rounded-t-md">
                                <th class="py-1 px-6 text-left  cursor-pointer">
                                    <div class="flex flex-col space-y-1">
                                        <x-table.sort name="name">{{ __('Nome') }}</x-table.sort>
                                        <x-table.filters.select name="role" :options="$this->roles" />
                                    </div>
                                </th>
                                <th class="py-1 px-6 text-left">
                                    <x-table.filters.status sort="1" />
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
                                            <x-table.status status="{{ $model->status }}" />
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <x-table.actions :model="$model" />
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
                                    <x-table.empty />
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
