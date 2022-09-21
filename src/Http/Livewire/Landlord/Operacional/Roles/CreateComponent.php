<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Http\Livewire\Landlord\Operacional\Roles;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\FormComponent;
use App\Models\Role;

class CreateComponent extends FormComponent
{
    use AuthorizesRequests;

    public $title = "Cadastrar";

    public function mount(Role $model)
    {
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties($model);
        data_set($this->data,'assets', 'noticias');
        data_set($this->data,'name', '');
        data_set($this->data,'user_id', auth()->id());
        data_set($this->data,'status', 'draft');
        data_set($this->data,'created_at', now()->format("Y-m-d"));
        data_set($this->data,'updated_at', now()->format("Y-m-d"));
    }

    public function route(){
        Route::get('/operacional/roles/cadastrar', static::class)->name('admin.roles.create');
    }

    public function rules()
    {
        return [
            'name'=>'required'
        ];
    }



    public function getListProperty()
    {
        return 'admin.roles';
    }
    public function getDeleteProperty()
    {
       return 'admin.roles.delete';
    }

    public function getEditProperty()
    {
       return 'admin.roles.edit';
    }

    public function getCreateProperty()
    {
       return 'admin.roles.create';
    }
    public function view()
    {
        return 'tall::landlord.operacional.roles.create';
    }
}
