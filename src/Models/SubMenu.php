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


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d'
    ];
     /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    // protected $appends = [
    //     'parents'
    // ];

    //protected $table = "table";
    public function sub_menus()
    {
        return $this->hasMany(\App\Models\SubMenu::class, 'sub_menu_id')
        ->where('status', 'published')
        ->orderby('ordering')
        ->orderby('name');
    }
    public function menu()
    {
        return $this->belongsTo(\App\Models\Menu::class, 'menu_id');
    }

    public function sub_menu()
    {
        return $this->belongsTo(\App\Models\SubMenu::class, 'sub_menu_id');
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
