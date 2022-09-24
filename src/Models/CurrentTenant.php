<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tall\Models\AbstractModel;
use Tall\Tenant\Models\Concerns\UsesLandlordConnection;

class CurrentTenant extends AbstractModel
{
    use HasFactory, UsesLandlordConnection;

    protected $guarded = ['id'];
    protected $appends = ['sub_menus'];
    
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        //static::$landlord->disable();
    }
    protected $table = "tenants";


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

    public function copy_tenants()
    {
        return $this->hasOne(\Tall\Models\CopyTenant::class, 'tenant_id');
    }
    
    public function sub_menus()
    {
        return $this->belongsToMany(\App\Models\SubMenu::class,'sub_menu_tenant','tenant_id')
        ->with('sub_menu_ordering')
        ->where('sub_menus.status', 'published')
        ->whereNull('sub_menus.sub_menu_id');
    }
    /**
     * Get the default cover photo URL if no cover photo has been uploaded.
     *
     * @return string
     */
    protected function defaultCoverPhotoUrl()
    {
        return asset('img/logo-black.png');
    }
}