<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tall\Tenant\Models\Concerns\UsesLandlordConnection;

class Menu extends AbstractModel
{
    use HasFactory,UsesLandlordConnection;

    protected $guarded = ['id'];
    protected $with = ['sub_menus'];

    //protected $table = "table";

       
    public function sub_menus()
    {
        if(class_exists(\App\Models\SubMenu::class)){
            return $this->hasMany(\App\Models\SubMenu::class, 'menu_id')
            ->where('status', 'published')
            ->whereNull('sub_menu_id')
            ->orderby('ordering')
            ->orderby('name');
        }
        
        return $this->hasMany(\Tall\Models\SubMenu::class, 'menu_id')
        ->where('status', 'published')
        ->whereNull('sub_menu_id')
        ->orderby('ordering')
        ->orderby('name');
    }
}
