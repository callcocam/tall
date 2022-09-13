<?php
/**
 * Created by Bengs.
 * User: contato@bengs.com.br
 * https://www.bengs.com.br
 */

namespace Tall\Models\Auth\Acl\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Tall\Models\Auth\Acl\Concerns\RefreshesPermissionCache;
use Tall\Models\Auth\Acl\Concerns\UsesLandlordConnection;
use Tall\Models\AbstractModel;

class Permission extends AbstractModel implements \Tall\Models\Auth\Acl\Contracts\Permission
{
    use RefreshesPermissionCache, UsesLandlordConnection, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Permissions can belong to many roles.
     *
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(config('acl.models.role'))->withTimestamps();
    }

}
