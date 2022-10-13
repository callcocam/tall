<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Http\Livewire\Landlord\Operacional\Tenants;

use Livewire\Component;
use App\Models\SubMenu;
use App\Models\Menu;
use App\Models\CurrentTenant;
use Tall\Models\SubMenuOrdering;

class ItemsComponent extends Component
{
    public $currentModel;
    public $actionType;
    public $menu;
    public $model;
    public $stepMenus=[];
    protected $listeners = ['loadMenusAdd'=>'loadMenus','closeModal'=>'showModalToggleManager'];
    public function mount(CurrentTenant $model, Menu $menu, SubMenuOrdering $submenu)
    {
       $this->model = $model;
       $this->menu = $menu;
       $this->submenu = $submenu;
    }

    public function getSubMenusProperty()
    {
        return $this->submenu->sub_menus()
        ->where('tenant_id',$this->model->id)       
        ->where('menu_id',$this->menu->id)
        ->get();
    }

    public function render()
    {
        return view('tall::landlord.operacional.tenants.items-component');
    }

    public function reorderItems($params)
    {
        $groupId = data_get($params, 'groupId');
        $menuIds = array_filter($params['menuIds']);

        \DB::transaction(function () use ($menuIds, $groupId) {
            \Tall\Models\SubMenuOrdering::query()->findMany($menuIds)
                ->each(function (\Tall\Models\SubMenuOrdering $Submenu) use ($groupId, $menuIds) {
                    $arr = array_flip($menuIds);
                    $Submenu->ordering = data_get($arr, $Submenu->id);
                    //$Submenu->sub_menu_id  = $groupId;
                    $Submenu->save();
                });
        });
    }

    public function loadMenus(){}

    public function showModalToggleManager($id = null, $actionType=0)
    {       $this->currentModel =  null;
            $this->actionType =  0;
        if($sub = $this->menu->sub_menus()->where('id', $id)->first()){
            $this->currentModel =  $sub;
            $this->actionType =  $actionType;
        }
        
    }
}
