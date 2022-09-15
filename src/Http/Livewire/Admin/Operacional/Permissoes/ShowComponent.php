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

class ShowComponent extends FormComponent
{
    use AuthorizesRequests;

    public $title = "Visualizar";

    public function mount(Permission $model)
    {
         $this->authorize(Route::currentRouteName());

        $this->data = $model->toArray();
        $this->model = $model;
    }

    public function route(){
        Route::get('/operacional/permissoes/{model}/visualizar', static::class)->name('admin.permissions.view');
    }

    public function getListProperty()
    {
        return 'admin.permissions';
    }

    public function getEditProperty()
    {
      return 'admin.permissions.edit';
    }
    public function getDeleteProperty()
    {
     return 'admin.permissions.delete';
    }
    public function view()
    {
        return 'tall::admin.operacional.permissoes.show';
    }
}
