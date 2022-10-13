<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/

namespace Tall\Models\Traits;

use Tall\Models\SubMenuOrdering;
use Tall\Models\CopyTenant;
/**
 * Funcões extra para o tenant
 */
trait TenantTrait
{
    
    public function sub_menu_orderings()
    {
        return $this->hasMany(SubMenuOrdering::class,'tenant_id')
        ->whereNull('parent_sub_menu_id')
        ->with([
            'sub_menus'=>fn($sub)=> $sub->where('tenant_id',$this->id),
            'sub_menu'=>fn($sub)=> $sub->tenant($this->id)   
        ]) 
        ->with('tenant')
        ->orderBy('ordering');

    }

    public function sub_menus()
    {
        if(class_exists(\App\Models\SubMenu::class)){
            return $this->belongsToMany(\App\Models\SubMenu::class,'sub_menu_tenant','tenant_id')
            ->with('sub_menu_ordering')
            ->where('sub_menus.status', 'published')
            ->whereNull('sub_menus.sub_menu_id');
        }
        return $this->belongsToMany(\Tall\Models\SubMenu::class,'sub_menu_tenant','tenant_id')
        ->with('sub_menu_ordering')
        ->where('sub_menus.status', 'published')
        ->whereNull('sub_menus.sub_menu_id');
    }

}
