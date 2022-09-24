<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Http\Livewire\Landlord\Operacional\Tenants;

use Livewire\Component;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\CurrentTenant;

class GroupsComponent extends Component
{
    public $currentModel;
    public $actionType;
    public $showToggle=[];
    public $model;
    public $menu;
    public $data = [];

    protected $listeners = ['loadMenusAdd'=>'loadMenus','closeModal'=>'showModalToggleManager'];

    public function mount(CurrentTenant $model, Menu $menu)
    {
       $this->model = $model;
       $this->menu = $menu;
    }

    public function getMenusProperty()
    {
        return $this->loadMenus();
    }


    public function loadMenus()
    {
        return $this->model->sub_menu_orderings()
        
        ->where('menu_id',$this->menu->id)->get();
    }

    public function render()
    {
        return view('tall::landlord.operacional.tenants.groups-component');
    }
    public function reorderGroups($data)
    {
        $groups = \Tall\Models\SubMenuOrdering::query()->findMany($data);
 
        $groups->map(function (\Tall\Models\SubMenuOrdering $group) use ($data) {
            $arr = array_flip(array_filter($data));
            $group->ordering = data_get($arr, $group->id);
            return $group;
        });

        $groupsArrs =  $groups->toArray();
        $groupsArr=[];
        if($groupsArrs){
            foreach($groupsArrs as $group){
                unset($group['sub_menus']);
                $groupsArr[] = $group;
            }
        }
        \Tall\Models\SubMenuOrdering::query()->upsert(
            $groupsArr,
            ['id'],
            ['ordering']
        );
    }

    public function showToggle($model, $value)
    {
        $this->showToggle[$model] = $value;
    }

}
