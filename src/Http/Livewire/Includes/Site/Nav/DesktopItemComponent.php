<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Http\Livewire\Includes\Site\Nav;

use Livewire\Component;
use App\Models\SubMenu;

class DesktopItemComponent extends Component
{
    public $menu;

    public function mount(Submenu $menu)
    {
       $this->menu = $menu;
    }
    public function render()
    {
        if ($sub_menus=  $this->menu->sub_menus):
            return view('tall::includes.site.nav.desktop-items-component', compact('sub_menus'));
        else:
            return view('tall::includes.site.nav.desktop-item-component');
        endif;
    }
}
