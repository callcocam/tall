<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Http\Livewire\Admin\Operacional\Menus\SubMenus;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\TableComponent;
use App\Models\Menu;
use App\Models\SubMenu;

class ListComponent extends TableComponent
{
    use AuthorizesRequests;

    public function mount()
    {
        $this->authorize(Route::currentRouteName());
    }

    public function route(){
        Route::get('/operacional/menus/sub-menus', static::class)->name('admin.sub-menus');
    }

    public function query()
    {
        $builder = SubMenu::query();
        if($role = data_get($this->filters, 'menu')){
            $builder->whereHas('menu', function ($builder) use ($role) {
                $builder->where('id', $role);
            });
        }
        if($parent = data_get($this->filters, 'parent')){
            $builder->where('sub_menu_id', $parent);
        }
        return $builder;
    }

    public function getMenusProperty()
    {
        return Menu::query()->pluck('name','id')->toArray();
    }

    public function getParentsProperty()
    {
        return SubMenu::query()->whereNull('sub_menu_id')->pluck('name','id')->toArray();
    }

    public function getListProperty()
    {
        return 'admin.sub-menus';
    }

    public function getCreateProperty()
    {
        return 'admin.sub-menus.create';
    }

    public function getShowProperty()
    {
       return 'admin.sub-menus.view';
    }
    public function getEditProperty()
    {
       return 'admin.sub-menus.edit';
    }
    public function getDeleteProperty()
    {
       return 'admin.sub-menus.delete';
    }
    public function view()
    {
        return 'tall::admin.operacional.menus.sub-menus.list';
    }
}
