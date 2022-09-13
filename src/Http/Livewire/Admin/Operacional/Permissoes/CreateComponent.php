<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Http\Livewire\Admin\Operacional\Permissoes;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\FormComponent;
use App\Models\Permission;

class CreateComponent extends FormComponent
{
    use AuthorizesRequests;

    public $title = "Cadastrar";

    public function mount(Permission $model)
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
        Route::get('/operacional/permissoes/cadastrar', static::class)->name('admin.permissions.create');
    }

    public function rules()
    {
        return [
            'data.name'=>'required'
        ];
    }

    public function getListProperty()
    {
        return 'admin.permissions';
    }
    public function getDeleteProperty()
    {
       return 'admin.permissions.delete';
    }

    public function getEditProperty()
    {
       return 'admin.permissions.edit';
    }

    public function getCreateProperty()
    {
       return 'admin.permissions.create';
    }
    public function view()
    {
        return 'admin.operacional.permissoes.create';
    }
}
