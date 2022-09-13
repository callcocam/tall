<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Http\Livewire\Admin\Operacional\Menus;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\TableComponent;
use App\Models\Menu;

class ListComponent extends TableComponent
{
    use AuthorizesRequests;

    public function mount()
    {
        $this->authorize(Route::currentRouteName());
    }

    public function route(){
        Route::get('/operacional/menus', static::class)->name('admin.menus');
    }

    public function query()
    {
        return Menu::query();
    }

    public function view()
    {
        return 'admin.operacional.menus.list';
    }

    public function getListProperty()
    {
        return 'admin.menus';
    }

    public function getCreateProperty()
    {
        return 'admin.menus.create';
    }

    public function getShowProperty()
    {
       return 'admin.menus.view';
    }
    public function getEditProperty()
    {
       return 'admin.menus.edit';
    }
    public function getDeleteProperty()
    {
       return 'admin.menus.delete';
    }
}
