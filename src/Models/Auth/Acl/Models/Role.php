<?php
/**
 * Created by Bengs.
 * User: contato@bengs.com.br
 * https://www.bengs.com.br
 */

namespace Tall\Models\Auth\Acl\Models;


use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Tall\Models\Auth\Acl\Concerns\HasPermissions;
use Tall\Models\Auth\Acl\Contracts\Role as ContractRole;
use Tall\Models\Auth\Acl\Concerns\UsesLandlordConnection;
use Tall\Models\AbstractModel;

class Role extends AbstractModel implements ContractRole
{
    use HasPermissions, UsesLandlordConnection, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    protected $appends = ['permissions'];

    public function getPermissionsAttribute()
    {
        return $this->permissions()->pluck('id','id')->toArray();
    }

    // public function access()
    // {

    //     return $this->permissions();
    // }


    /**
     * Roles can belong to many users.
     *
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany( User::class)->withTimestamps();
    }

   /**
     * Determine if role has permission flags.
     *
     * @return bool
     */
    public function hasPermissionFlags(): bool
    {
        return !is_null($this->special);
    }

    /**
     * Determine if the requested permission is permitted or denied
     * through a special role flag.
     *
     * @return bool
     */
    public function hasPermissionThroughFlag(): bool
    {
        if ($this->hasPermissionFlags()) {
            return !($this->special === 'no-access');
        }

        return true;
    }
}
