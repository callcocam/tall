<?php

/**
 * Created by Bengs.
 * User: contato@bengs.com.br
 * https://www.bengs.com.br
 */


namespace Tall\Http\Livewire\Admin\Operacional\Cms\Inputs\Options;

use Tall\Http\Livewire\FormComponent;

class CreateComponent extends FormComponent
{

    public $title = "Editar";
    public $name;
    protected $array_field = [];

    public function mount($model,$options, $name)
    {
        $this->array_field = $options;
        $this->name = $name;
        $this->setFormProperties($model);
        data_set($this->data, $name, []);
    
    }

    public function add()
    {
       
        if ($this->model->options()->create(data_get($this->data, $this->name))) {
            $this->emit('loadModels');
            return  true;
        }
        return  false;
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


    public function view()
    {
        return 'tall::admin.operacional.cms.inputs.options.create';
    }
}
