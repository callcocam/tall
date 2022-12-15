<?php
/**
 * Created by Bengs.
 * User: contato@bengs.com.br
 * https://www.bengs.com.br
 */

namespace Tall\Models\Auth;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Tall\Models\AbstractModel;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Tall\Models\Concerns\HasProfilePhoto;
use Tall\Models\Auth\Acl\Concerns\HasRolesAndPermissions;
use Tall\Tenant\Models\Concerns\UsesLandlordConnection;

class User extends AbstractModel implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable,HasProfilePhoto, Authorizable, CanResetPassword, MustVerifyEmail, HasRolesAndPermissions, UsesLandlordConnection;



    public function scopeRoles($query, $term)
    {
        return $query->whereHas('roles', function ($builder) use ($term) {
            $builder->where('id', $term);
        });
    }
    public function compras()
    {
        return $this->roles()->where('slug', 'compras');;
    }
    
    protected $appends = ['access'];

    public function getAccessAttribute()
    {
        return $this->roles()->pluck('id','id')->toArray();
    }



}
