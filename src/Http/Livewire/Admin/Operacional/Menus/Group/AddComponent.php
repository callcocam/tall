<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Http\Livewire\Admin\Operacional\Menus\Group;

use App\Models\Menu;
use Tall\Http\Livewire\FormComponent;

class AddComponent extends FormComponent
{
    public $showModal=false;

    public function mount(Menu $model)
    {
        $this->model =  $model;
        data_set($this->data,'id', null);
        data_set($this->data,'name', '');
        data_set($this->data,'slug', '');
        data_set($this->data,'link', '');
        data_set($this->data,'icone', '');
        data_set($this->data,'attributes', '');
        data_set($this->data,'description', '');
        data_set($this->data,'menu_id', $model->id);
        data_set($this->data,'sub_menu_id', null);
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

    public function save()
    {
        try {
            if($this->model->sub_menus()->create($this->data)){
                $this->success( __('SHOW!!'), __("Cadastro atualizado com sucesso!!"));
                $this->showModalToggle();
                $this->emit('loadMenusAdd');
                data_set($this->data,'id', null);
                data_set($this->data,'name', '');
                data_set($this->data,'slug', '');
                data_set($this->data,'link', '');
                data_set($this->data,'icone', '');
                data_set($this->data,'attributes', '');
                data_set($this->data,'description', '');
                return true;
            }
            return false;
        } catch (\PDOException $PDOException) {
            $this->error('Error !!!', __($PDOException->getMessage()));
        }
        return false;
    }
    public function showModalToggle()
    {
        $this->showModal = !$this->showModal;
    }

    
    public function getIconsProperty()
    {
        return load_icones(data_get($this->filters,'icone', ""));
    }
    
    public function view()
    {
        return 'tall::admin.operacional.menus.group.add';
    }
}
