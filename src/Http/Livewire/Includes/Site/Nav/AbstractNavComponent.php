<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Http\Livewire\Includes\Site\Nav;

use Livewire\Component;
use App\Models\Menu;
use App\Models\SubMenu;

abstract class AbstractNavComponent extends Component
{

    public $search="";

    public $showDropdown=true;
    public $currentMenu = 'currentMenuSite';

    protected $listeners = ['loadMenus'];

    public function getMenusProperty()
    {
        $menus = [];
        $this->currentMenu = config('tall.multitenancy.current_tenant_container_menus_key.currentMenuSite', 'menus-site');
        if(app()->has($this->currentMenu)){
            $builder =  app($this->currentMenu);
            if($builder instanceof \Illuminate\Database\Eloquent\Relations\HasMany){
                if( $builder){
                    if($sarch = $this->search){
                        $builder->where('name','LIKE',"%{$this->search}%");
                    }
                    $menus = $builder->get()->map(function (SubMenu $SubMenu) {
                        $SubMenu->parents = $SubMenu;
                        return $SubMenu;
                    });
                }
            }
            else{
                $menus = $builder;
            }
        }
       
        return $menus;
    }

    public function render()
    {
        return view($this->view());
    }

    public function loadMenus($data = [])
    {

    }
}
