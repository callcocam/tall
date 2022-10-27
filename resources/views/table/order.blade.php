<div>
    @if ($models->count())
        <x-tall-table.sortable class="text-gray-600 text-sm font-light ">
            @foreach ($models as $model)
                <div data-id="{{ $model->id }}"
                    class="border-b border-gray-200 hover:bg-gray-100 cursor-pointer flex items-center justify-between draggable">
                    <div class="py-1 px-6 text-left">
                        {{ $model->name }} - {{ $model->ordering }}
                    </div>
                    <div class="py-3 px-6 text-center draggable-handler">
                        <x-tall-icon name="arrows-expand" class="w-8 h-8" />
                    </div>
                </div>
            @endforeach
        </x-tall-table.sortable>
        <div>
            <div class="w-full p-2 space-x-3">
                {{ $models->links() }}
            </div>
        </div>
    @else
        <div>
            <div class="w-full p-2 space-x-3">
                <x-tall-table.empty route="{{ route($this->list) }}" />
            </div>
        </div>
    @endif
</div>
