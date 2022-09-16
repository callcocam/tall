<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Http\Livewire\Admin\Operacional\Tenants;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\FormComponent;
use App\Models\CurrentTenant;

class CreateComponent extends FormComponent
{
    use AuthorizesRequests;

    public $title = "Cadastrar";

    public function mount(CurrentTenant $model)
    {
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties($model);
        data_set($this->data,'name', '');
        data_set($this->data,'user_id', auth()->id());
        data_set($this->data,'status', 'draft');
        data_set($this->data,'created_at', now()->format("Y-m-d"));
        data_set($this->data,'updated_at', now()->format("Y-m-d"));
    }

    public function route(){
        Route::get('/operacional/tenant/cadastrar', static::class)->name('admin.tenants.create');
    }

    public function rules()
    {
        return [
            'name'=>'required'
        ];
    }



    public function getListProperty()
    {
        return 'admin.tenants';
    }
    public function getDeleteProperty()
    {
       return 'admin.tenants.delete';
    }

    public function getEditProperty()
    {
       return 'admin.tenants.edit';
    }

    public function getCreateProperty()
    {
       return 'admin.tenants.create';
    }
    public function view()
    {
        return 'tall::admin.operacional.tenants.create';
    }
}
