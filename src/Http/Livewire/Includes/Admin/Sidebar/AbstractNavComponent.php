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

abstract class AbstractNavComponent extends Component
{

    public $search="";

    public $tenant="";

    protected $queryString = [
        'tenant' => ['except' => ""],
        'search' => ['except' => ""],
    ];
    public $showDropdown=true;

    protected $listeners = ['loadMenus'];

    public function mount()
    {
        $this->tenant = request()->query('tenant');
    }
    public function getTenantsProperty()
    {
       return \Tall\Models\Tenant::all();
    }

    public function getMenusProperty()
    {
        $menus = [];
        $this->currentMenu = config('tall.multitenancy.current_tenant_container_menus_key.currentMenuAdmin', 'menu-admin');
       
        if($this->tenant){
          if($builder = \Tall\Models\CurrentTenant::find($this->tenant)){
            $menu = \Tall\Models\Menu::query()->where('slug', $this->currentMenu)->first();         
            return $builder->sub_menu_orderings()        
            ->where('menu_id',$menu->id)->get();
          }
        }
        else{
            return $this->getLoadMenus();
        }
    }

    public function render()
    {
        return view($this->view());
    }

    public function loadMenus($data = [])
    {

    }

    public function getLoadMenus()
    {
        $menus = [];
        if(app()->has($this->currentMenu)){
            $builder =  app($this->currentMenu);    
             
            if( $builder){      
                if($builder instanceof \Illuminate\Database\Eloquent\Relations\HasMany){
                    $related = $builder->getRelated();
                    if($related instanceof \App\Models\SubMenu){
                        if($sarch = $this->search){
                            $builder->where('name','LIKE',"%{$this->search}%");
                        }
                        $menus = $builder->get()->map(function (\App\Models\SubMenu $SubMenu) {
                            $SubMenu->parents = $SubMenu;
                            return $SubMenu;
                        });
                    }elseif($related instanceof \Tall\Models\SubMenu){
                        if($sarch = $this->search){
                            $builder->where('name','LIKE',"%{$this->search}%");
                        }
                        $menus = $builder->get()->map(function (\Tall\Models\SubMenu $SubMenu) {
                            $SubMenu->parents = $SubMenu;
                            return $SubMenu;
                        });
                    }
                    else{
                       
                        // if($sarch = $this->search){
                        //     $builder->where('name',' LIKE',"%{$this->search}%");
                        // }
                        $menus = $builder->get();
                        // ->map(function (\Tall\Models\SubMenuOrdering $SubMenu) {
                        //     $SubMenu->parents = $SubMenu;
                        //     return $SubMenu;
                        // })
                    }
                }
                else{
                    $menus = $builder;
                }               
            }
        }
        return $menus;
    }
}
