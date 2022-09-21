<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Http\Livewire\Landlord\Operacional\Menus\Group\Items;

use App\Models\SubMenu;
use Tall\Http\Livewire\FormComponent;

class AddComponent extends FormComponent
{

    public $title;
    public $showModal=false;

    public function mount(SubMenu $model)
    {
        $this->title =  $model->name;
        $this->model = app(SubMenu::class);
        data_set($this->data,'id', null);
        data_set($this->data,'name', '');
        data_set($this->data,'slug', '');
        data_set($this->data,'link', '');
        data_set($this->data,'icone', '');
        data_set($this->data,'attributes', '');
        data_set($this->data,'description', '');
        if($menu = $model->menu)
         data_set($this->data,'menu_id', $menu->id);
        else
         data_set($this->data,'menu_id', $model->id);
        data_set($this->data,'sub_menu_id', $model->id);
        data_set($this->data,'user_id', auth()->id());
        data_set($this->data,'status', 'published');
        data_set($this->data,'created_at', now()->format("Y-m-d H:i:s"));
        data_set($this->data,'updated_at', now()->format("Y-m-d H:i:s"));
    }

    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }

    public function view()
    {
        return 'tall::landlord.operacional.menus.group.items.add';
    }

    public function save()
    {
        if(parent::save()){
            $this->showModalToggle();
            $this->emit('loadMenusAdd');
            data_set($this->data,'id', null);
            data_set($this->data,'name', '');
            data_set($this->data,'slug', '');
            data_set($this->data,'link', '');
            data_set($this->data,'icone', '');
            data_set($this->data,'attributes', '');
            data_set($this->data,'description', '');
            $this->model = app(SubMenu::class);
        }
        return true;
    }
    
    
    public function getIconsProperty()
    {
        return load_icones(data_get($this->filters,'icone', ""));
    }
    
    public function showModalToggle()
    {
        $this->showModal = !$this->showModal;
    }
}
