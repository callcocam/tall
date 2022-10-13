@if ($stepMenus = data_get($data, 'sub_menus'))
    @if ($menus = $this->menus)
        @foreach ($menus as $menu)
            @livewire('tall::landlord.operacional.tenants.groups-component', ['model'=>$model,'menu'=>$menu], key(uniqid($model->id)))
        @endforeach
    @endif
@endif