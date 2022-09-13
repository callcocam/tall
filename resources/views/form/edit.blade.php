<form wire:submit.prevent="submit" class="border-t border-gray-200">
    <x-errors />
    <dl>
        @foreach ($data as $name => $value)
            @if (!in_array($name, $this->ignores))
                @if ($field = \Arr::get($this->types, $name))
                    {{ $field->render()->with('data', $data)->with('field', $name)->with('model', $model) }}
                @endif
            @endif
        @endforeach
        <div class="bg-white px-4 py-5 flex justify-between sm:px-6">
            @if ($list = $this->list)
                <x-button red squared href="{{ route($list) }}" icon="arrow-narrow-left"
                    label="{{ __('Voltar para a lista') }}" primary />
            @endif
            <x-button icon="save" indigo squared type="submit" label="{{ __('Salvar alterações') }}" />
        </div>
    </dl>
</form>
