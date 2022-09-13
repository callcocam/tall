<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Http\Livewire;

use Livewire\Component;
use Tall\Http\Livewire\Traits\FollowsRules;
use Tall\Http\Livewire\Traits\DeleteTrait;

abstract class AbstractDeleteComponent extends AbstractComponent
{

    use FollowsRules, DeleteTrait;

    public $model;
    public $data = [];
    public $filters = [];
    
    public function layout()
    {
        return "tall::layouts.admin";
    }

    protected function data(){
        return [
            'data'=>$this->data
        ];
    }

      /**
     * @param null $model
     */
    public function setFormProperties($model = null)
    {
        $this->model = $model;
        if ($model) {
            $this->data = $model->toArray();
        }
    }


    public function getFieldProperty()
    {
        return 'name';
    }

}
