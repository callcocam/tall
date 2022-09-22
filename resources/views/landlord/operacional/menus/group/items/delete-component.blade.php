<div>
    {{-- <x-circle-button type="button" title="{{ __('Trash') }}" icon="trash" wire:click="showModalToggle" /> --}}
    <x-tall::modal-delete>
        <x-slot name="actions">
        </x-slot>
        Tem certeza de que deseja desativar sua conta? Todos os seus dados serão removidos permanentemente de nossos
        servidores
        para todo sempre. Essa ação não pode ser desfeita.
    </x-tall::modal-delete>
</div>
