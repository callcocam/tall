@if ($status)
    <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">{{ __('Abilitado') }}</span>
@else
    <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">{{ __('Desabilitado') }}</span>
@endif
