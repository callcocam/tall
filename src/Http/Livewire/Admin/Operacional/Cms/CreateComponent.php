<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Http\Livewire\Admin\Operacional\Cms;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\FormComponent;
use App\Models\Input;

class CreateComponent extends FormComponent
{
    use AuthorizesRequests;

    public $title = "Cadastrar";

    public function mount(Input $model)
    {
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties($model);
        data_set($this->data,'name', '');
        data_set($this->data,'user_id', auth()->id());
        data_set($this->data,'status', 'draft');
        data_set($this->data,'created_at', now()->format("Y-m-d H:i:s"));
        data_set($this->data,'updated_at', now()->format("Y-m-d H:i:s"));
    }

    public function route(){
        Route::get('/operacional/cms/inputs/cadastrar', static::class)->name('admin.cms.inputs.create');
    }

    public function rules()
    {
        return [
            'name'=>'required'
        ];
    }

    public function getListProperty()
    {
        return 'admin.cms.inputs';
    }
    public function getDeleteProperty()
    {
       return 'admin.cms.inputs.delete';
    }

    public function getEditProperty()
    {
       return 'admin.cms.inputs.edit';
    }

    public function getCreateProperty()
    {
       return 'admin.cms.inputs.create';
    }
    public function view()
    {
        return 'tall::admin.operacional.cms.inputs.create';
    }
}
