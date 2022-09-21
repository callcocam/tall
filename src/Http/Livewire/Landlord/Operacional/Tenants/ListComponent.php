<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Http\Livewire\Landlord\Operacional\Tenants;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\TableComponent;
use App\Models\CurrentTenant;

class ListComponent extends TableComponent
{
    use AuthorizesRequests;

    public function mount()
    {
        $this->authorize(Route::currentRouteName());
    }

    public function route(){
        Route::get('/operacional/tenants', static::class)->name('admin.tenants');
    }

    public function query()
    {
        return CurrentTenant::query();
    }

    public function getListProperty()
    {
        return 'admin.tenants';
    }

    public function getCreateProperty()
    {
        return 'admin.tenants.create';
    }

    public function getShowProperty()
    {
       return 'admin.tenants.view';
    }
    public function getEditProperty()
    {
       return 'admin.tenants.edit';
    }
    public function getDeleteProperty()
    {
       return 'admin.tenants.delete';
    }
    public function view()
    {
        return 'tall::landlord.operacional.tenants.list';
    }
}
