<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Http\Livewire\Includes\Admin\Sidebar;

use Livewire\Component;
use App\Models\Menu;
use App\Models\SubMenu;

class NavComponent extends Component
{

    public $search="";

    public $showDropdown=true;

    protected $listeners = ['loadMenus'];

    public function getMenusProperty()
    {
        $menus = [];
        if($menu = Menu::query()->where([
            'slug' => 'menu-admin',
        ])->first()){
            $builder =  $menu->sub_menus();
            if($sarch = $this->search){
                $builder->where('name','LIKE',"%{$this->search}%");
            }
            $menus = $builder->get()->map(function (SubMenu $SubMenu) {
                $SubMenu->parents = $SubMenu;

                return $SubMenu;
            });
        }
        return $menus;
    }

    public function render()
    {
        return view('tall::includes.admin.sidebar.nav-component');
    }

    public function loadMenus($data = [])
    {

    }
}
