<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Http\Livewire\Landlord\Operacional\Menus;

use Livewire\Component;
use App\Models\SubMenu;
use App\Models\Menu;

class ItemsComponent extends Component
{
    public $menu;
    public $model;
    protected $listeners = ['loadMenusAdd'=>'loadMenus'];
    public function mount(Menu $model, SubMenu $menu)
    {
       $this->model = $model;
       $this->menu = $menu;
    }

    public function getSubMenusProperty()
    {
        return $this->menu->sub_menus()->orderBy('ordering')->get();
    }

    public function render()
    {
        return view('tall::landlord.operacional.menus.items-component');
    }

    public function reorderItems($params)
    {
        $groupId = data_get($params, 'groupId');
        $menuIds = array_filter($params['menuIds']);

        \DB::transaction(function () use ($menuIds, $groupId) {
            SubMenu::query()->findMany($menuIds)
                ->each(function (SubMenu $Submenu) use ($groupId, $menuIds) {
                    $Submenu->ordering = array_flip($menuIds)[$Submenu->id];
                    $Submenu->sub_menu_id  = $groupId;
                    $Submenu->save();
                });
        });
        //$this->emit('loadMenus');
    }

    public function loadMenus(){}

}
