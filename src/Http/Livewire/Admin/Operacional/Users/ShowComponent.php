<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Http\Livewire\Admin\Operacional\Users;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\FormComponent;
use App\Models\User;

class ShowComponent extends FormComponent
{
    use AuthorizesRequests;

    public $title = "Visualizar";

    public function mount(User $model)
    {
         $this->authorize(Route::currentRouteName());

        $this->data = $model->toArray();
        $this->model = $model;
    }

    public function route(){
        Route::get('/operacional/users/{model}/visualizar', static::class)->name('admin.users.view');
    }

    public function getListProperty()
    {
        return 'admin.users';
    }

    public function getEditProperty()
    {
      return 'admin.users.edit';
    }
    public function getDeleteProperty()
    {
     return 'admin.users.delete';
    }
    public function view()
    {
        return 'tall::admin.operacional.users.show';
    }
}
