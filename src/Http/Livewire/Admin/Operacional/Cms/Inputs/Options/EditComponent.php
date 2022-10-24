<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/


namespace Tall\Http\Livewire\Admin\Operacional\Cms\Inputs\Options;

use Tall\Http\Livewire\FormComponent;
use Tall\Models\InputOption;

class EditComponent extends FormComponent
{

    public $title = "Editar";
    public $name;
    public $confirm = false;
    protected $array_field = [];

    public function mount(InputOption $item, $options, $name)
    {
        $this->array_field = $options;
        $this->name = $name;
        $this->setFormProperties($item);
         //dd($this->data);
    }

    public function cancel()
    {
        $this->confirm = $this->confirm ? false : true;
       
    }
    public function delete()
    {
        if($this->model->delete()){
            $this->success( __('OPSS!!'), __("Cadastro excluido com sucesso!!"));  
            $this->emit('loadModels');  
            return true;
        }
        $this->error( __('OPSS!!'), __("Não foi possivel excluir o cadastro!!")); 
        return false;
    }

    protected function save()
    {
       if(parent::save()){
        $this->emit('loadModels');  
        return true;
       }
    }

    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }

    public function getArrayFieldProperty()
    {

        return $this->array_field;
    }

    public function getListProperty()
    {
        return 'admin.cms.inputs';
    }

    public function view()
    {
        return 'tall::admin.operacional.cms.inputs.options.edit';
    }
}
