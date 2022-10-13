<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Http\Livewire\Landlord\Operacional\Users;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\TableComponent;
use Tall\Models\UserLandlord as User;
use App\Models\Role;

class ListComponent extends TableComponent
{
    use AuthorizesRequests;

    public function mount()
    {
        $this->authorize(Route::currentRouteName());
    }

    public function route(){
        Route::get('/operacional/users', static::class)->name('admin.users');
    }

    public function getRolesProperty()
    {
        return Role::query()->pluck('name','id')->toArray();
    }

    public function query()
    {
        $builder = User::query();

        if($role = data_get($this->filters, 'role')){
            $builder->whereHas('roles', function ($builder) use ($role) {
                $builder->where('id', $role);
            });
        }
        return $builder;
    }

    public function getListProperty()
    {
        return 'admin.users';
    }

    public function getCreateProperty()
    {
        return 'admin.users.create';
    }

    public function getShowProperty()
    {
       return 'admin.users.view';
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
        return 'tall::landlord.operacional.users.list';
    }
}
