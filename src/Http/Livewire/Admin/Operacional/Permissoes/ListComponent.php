<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Http\Livewire\Admin\Operacional\Permissoes;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\TableComponent;
use App\Models\Permission;
use App\Models\Role;

class ListComponent extends TableComponent
{
    use AuthorizesRequests;

    public function mount()
    {
        $this->authorize(Route::currentRouteName());

        //\Tall\Models\Auth\Acl\LoadRouterHelper::save();
    }

    public function route(){
        Route::get('/operacional/permissoes', static::class)->name('admin.permissions');
    }

    public function query()
    {
        $builder = Permission::query();

        if($role = data_get($this->filters, 'role')){
            $builder->whereHas('roles', function ($builder) use ($role) {
                $builder->where('id', $role);
            });
        }
        return $builder;
    }

    public function view()
    {
        return 'admin.operacional.permissoes.list';
    }

    public function getRolesProperty()
    {
        return Role::query()->pluck('name','id')->toArray();
    }

    public function getListProperty()
    {
        return 'admin.permissions';
    }

    public function getCreateProperty()
    {
        return 'admin.permissions.create';
    }

    public function getShowProperty()
    {
       return 'admin.permissions.view';
    }
    public function getEditProperty()
    {
       return 'admin.permissions.edit';
    }
    public function getDeleteProperty()
    {
       return 'admin.permissions.delete';
    }


}
