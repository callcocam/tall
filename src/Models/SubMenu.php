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
    // protected $with = ['sub_menus'];

    //protected $table = "table";

    // public function scopeOrder($query)
    // {
    //    return $query->leftJoin('sub_menu_orderings', function ($join) {
    //             $join->on('sub_menus.id', '=', 'sub_menu_orderings.sub_menu_id')
    //         })->select('posts.*')->orderBy('sub_menu_orderings.order');
    // }

    public function sub_menu_ordering()
    {
      
        return $this->hasOne(SubMenuOrdering::class)->orderBy('ordering');

    }

    public function sub_menus()
    {
        if(class_exists(\App\Models\SubMenu::class)){
            return $this->hasMany(\App\Models\SubMenu::class, 'sub_menu_id')
            ->where('status', 'published');
        }
        
        return $this->hasMany(\Tall\Models\SubMenu::class,  'sub_menu_id')
        ->with('sub_menu_ordering')
        ->where('status', 'published');
    }
  
    public function tenant()
    {
        if(class_exists(\App\Models\SubMenu::class)){
            return $this->belongsToMany(\App\Models\Tenant::class)
            ->where('status', 'published');
        }
        
        return $this->belongsToMany(\Tall\Models\Tenant::class)
        ->where('status', 'published');
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
        return $this->sub_menus()->with('sub_menu_ordering')->pluck('slug','slug');
    }

      /**
    * @return string
    */
    protected function slugTo()
    {
        return false;
    }

    public function tenants()
    {
        return $this->belongsToMany(\Tall\Models\Tenant::class)
        ->where('sub_menus.status', 'published');
    }

    public function tenantsNull()
    {
        return $this->belongsToMany(\Tall\Models\Tenant::class)
        ->where('sub_menus.status', 'published')
        ->whereNull('sub_menus.sub_menu_id');
    }
    
    public function scopeTenant($query, $term)
    {
        return $query->whereHas('tenants', function ($builder) use ($term) {
            $builder->where('id', $term);
        });
    }

    public function scopeTenantNull($query, $term)
    {
        return $query->whereHas('tenantsNull', function ($builder) use ($term) {
            $builder->where('id', $term);
        });
    }
}
