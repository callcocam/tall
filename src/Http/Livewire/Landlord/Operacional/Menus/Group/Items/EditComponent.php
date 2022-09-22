<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Http\Livewire\Landlord\Operacional\Menus\Group\Items;

use App\Models\Menu;
use App\Models\SubMenu;
use Tall\Http\Livewire\FormComponent;

class EditComponent extends FormComponent
{

    public $showModal=false;

    public function mount(SubMenu $model, $showModal= false)
    {
        $this->showModal =$showModal;
        $this->model =$model;
        $this->data =$model->toArray();
    }

    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }

    public function save()
    {
        if(parent::save()){
            $this->emit('loadMenusAdd');
        }
        return true;
    }
    
    public function view()
    {
        return 'tall::landlord.operacional.menus.group.items.edit';
    }

    public function getIconsProperty()
    {
        return load_icones(data_get($this->filters,'icone', ""));
    }


    public function showModalToggle()
    {
        $this->showModal = false;        
        $this->emit('closeModal');
    }

}
