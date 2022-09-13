<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends AbstractModel
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['sub_menus'];

    public function sub_menus()
    {
        return $this->hasMany(\App\Models\SubMenu::class, 'menu_id')
        ->where('status', 'published')
        ->whereNull('sub_menu_id')
        ->orderby('ordering')
        ->orderby('name');
    }

    //protected $table = "table";
}
