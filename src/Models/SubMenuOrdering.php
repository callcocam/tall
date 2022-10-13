<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tall\Models\Menu as AbstractMenu;

class SubMenuOrdering extends AbstractMenu
{
    use HasFactory;

    protected $guarded = ['id'];
    /**
    * The attributes that should be cast.
    *
    * @var array
    */
   protected $casts = [
       'created_at' => 'datetime:Y-m-d',
       'updated_at' => 'datetime:Y-m-d'
   ];
 //protected $table = "table";

     /**
    * @return string
    */
    protected function slugTo()
    {
        return false;
    }
   
    public function tenant()
    {
        if(class_exists(\App\Models\Tenant::class)){
            return $this->belongsTo(\App\Models\Tenant::class, 'tenant_id')
            ->where('status', 'published');
        }
        
        return $this->belongsTo(\Tall\Models\Tenant::class, 'tenant_id')
        ->where('status', 'published');
    }
   
    public function sub_menu()
    {
        if(class_exists(\App\Models\SubMenu::class)){
            return $this->belongsTo(\App\Models\SubMenu::class, 'sub_menu_id')  
            ->whereNull('sub_menu_id')
            ->where('status', 'published');
        }
        
        return $this->belongsTo(\Tall\Models\SubMenu::class, 'sub_menu_id')           
            ->whereNull('sub_menu_id')
            ->where('status', 'published');
    }

    public function parent_sub_menu()
    {
        if(class_exists(\App\Models\SubMenu::class)){
            return $this->belongsTo(\App\Models\SubMenu::class, 'sub_menu_id')  
            ->where('status', 'published');
        }
        
        return $this->belongsTo(\Tall\Models\SubMenu::class, 'sub_menu_id')   
            ->where('status', 'published');
    }
    
    public function sub_menus()
    {
        if(class_exists(\App\Models\SubMenuOrdering::class)){
            return $this->hasMany(\App\Models\SubMenuOrdering::class, 'parent_sub_menu_id', 'sub_menu_id')
            ->with('parent_sub_menu') 
            ->whereNotNull('parent_sub_menu_id')
            ->orderBy('ordering');
        }
        return $this->hasMany(\Tall\Models\SubMenuOrdering::class, 'parent_sub_menu_id', 'sub_menu_id')
        ->with('parent_sub_menu') 
        ->whereNotNull('parent_sub_menu_id')
        ->orderBy('ordering');
    }
}
