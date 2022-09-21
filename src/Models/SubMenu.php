<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tall\Tenant\Models\Concerns\UsesLandlordConnection;

class SubMenu extends AbstractModel
{
    use HasFactory,UsesLandlordConnection;

    protected $guarded = ['id'];
    protected $with = ['sub_menus'];

    //protected $table = "table";

       
    public function sub_menus()
    {
        if(class_exists(\App\Models\SubMenu::class)){
            return $this->hasMany(\App\Models\SubMenu::class, 'sub_menu_id')
            ->where('status', 'published')
            ->orderby('ordering');
        }
        
        return $this->hasMany(\Tall\Models\SubMenu::class,  'sub_menu_id')
        ->where('status', 'published')
        ->orderby('ordering');
    }


    public function menu()
    {
        if(class_exists(\App\Models\Menu::class)){
            $this->belongsTo(\App\Models\Menu::class, 'menu_id');
        }
        return $this->belongsTo(\Tall\Models\Menu::class, 'menu_id');
    }

    public function getParentsAttribute()
    {
        return $this->sub_menus()->pluck('slug','slug');
    }

      /**
    * @return string
    */
    protected function slugTo()
    {
        return false;
    }
}
