<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Http\Livewire\Includes\Site;

use Tall\Http\Livewire\Includes\Site\Nav\AbstractNavComponent;

class FooterComponent extends AbstractNavComponent
{
    
    public $currentMenu = 'currentMenuSiteFooter';

    public function view()
    {
        return 'tall::includes.site.footer-component';
    }
}
