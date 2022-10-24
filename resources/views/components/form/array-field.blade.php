<fieldset class="border rounded-md flex flex-col m-4">
    <legend> {{ $label }}</legend>
    @if ($items = data_get($model, $name))
        <div class="overflow-hidden bg-white shadow sm:rounded-md">
            <ul role="list" class="divide-y divide-gray-200">
                @foreach ($items as $key => $item)
                    <li>
                        @livewire(sprintf('tall::%s.edit-component', $array_view),compact('item','options','name'), key(uniqId($item->id)))
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class=" flex space-x-2">
        @if ($options)
            @livewire(sprintf('tall::%s.create-component', $array_view), compact('model','options','name'), key(uniqId(date("YmdHis"))))
        @endif
    </div>
</fieldset>
