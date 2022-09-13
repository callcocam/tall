<form wire:submit.prevent="submit" class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900 flex space-x-2 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>Iniciar um novo cadastro.</span>
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
            Use o campo abaixo para iniciar um novo cadastro.</p>
    </div>
    <div class="border-t border-gray-200">
        <div class="bg-white px-4 py-5">
            <dt class="text-sm font-medium text-gray-500">
                @if ($model->exists)
                    Cadastro <b class="text-xl"> {{ data_get($model, $this->field) }}</b> foi criado com sucesso, o que
                    você
                    deseja fazer agora?
                @else
                    <b class="text-xl"> Tem certeza de que deseja criar um novo cadastro? </b>
                @endif
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0">
                <dl> 
                     <x-errors />
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
            </dd>
        </div>
    </div>
</form>
