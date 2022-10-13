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
use Tall\Models\Traits\TenantTrait;

class CurrentTenant extends AbstractModel
{
    use HasFactory, UsesLandlordConnection, TenantTrait;

    protected $guarded = ['id'];
    protected $appends = ['sub_menus'];
    
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        //static::$landlord->disable();
    }
    protected $table = "tenants";


    public function copy_tenants()
    {
        return $this->hasOne(CopyTenant::class, 'tenant_id');
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