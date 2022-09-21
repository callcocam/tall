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

class ShowComponent extends FormComponent
{
    use AuthorizesRequests;

    public $title = "Visualizar";
    public $filters = [];


    protected $queryString = [
        'filters' => ['except' => []]
    ];


    public function mount(Role $model)
    {
         $this->authorize(Route::currentRouteName());
         $this->setFormProperties($model);
    }

    public function route(){
        Route::get('/operacional/roles/{model}/visualizar', static::class)->name('admin.roles.view');
    }

    public function getListProperty()
    {
        return 'admin.roles';
    }

    public function getEditProperty()
    {
      return 'admin.roles.edit';
    }
    public function getDeleteProperty()
    {
     return 'admin.roles.delete';
    }
    public function view()
    {
        return 'tall::landlord.operacional.roles.show';
    }
}
