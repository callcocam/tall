<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Http\Livewire\Admin\Operacional\Roles;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\TableComponent;
use App\Models\Role;

class ListComponent extends TableComponent
{
    use AuthorizesRequests;

    public function mount()
    {
        $this->authorize(Route::currentRouteName());
    }

    public function route(){
        Route::get('/operacional/roles', static::class)->name('admin.roles');
    }

    public function query()
    {
        return Role::query();
    }

    public function view()
    {
        return 'admin.operacional.roles.list';
    }

    public function getListProperty()
    {
        return 'admin.roles';
    }

    public function getCreateProperty()
    {
        return 'admin.roles.create';
    }

    public function getShowProperty()
    {
       return 'admin.roles.view';
    }
    public function getEditProperty()
    {
       return 'admin.roles.edit';
    }
    public function getDeleteProperty()
    {
       return 'admin.roles.delete';
    }
}
