<?php
/**
 * Created by Bengs.
 * User: contato@bengs.com.br
 * https://www.bengs.com.br
 */

namespace  Tall\Models\Auth\Acl\Concerns;


use Tall\Models\Auth\Acl\Models\Permission;

trait HasRolesAndPermissions
{

    use HasRoles, HasPermissions;
    /**
     * Run through the roles assigned to the permission and
     * checks if the user has any of them assigned.
     *
     * @param  \Tall\Models\Permission  $permission
     * @return boolean
     */
    protected function hasPermissionThroughRole($permission): bool
    {
        if ($this->hasRoles()) {
            foreach ($permission->roles as $role) {
                if ($this->roles->contains($role)) {
                    return true;
                }
            }
        }

        return false;
    }

    protected function hasPermissionThroughRoleFlag(): bool
    {
        if ($this->hasRoles()) {
            return ! ($this->roles
                ->filter(function($role) {
                    return ! is_null($role->special);
                })
                ->pluck('special')
                ->contains('no-access'));
        }

        return false;
    }

}
