<?php
/**
 * Created by Bengs.
 * User: contato@bengs.com.br
 * https://www.bengs.com.br
 */
namespace Tall\Models\Auth\Acl\Contracts;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface Permission
{
    /**
     * Permissions can belong to many roles.
     *
     * @return Model
     */
    public function roles(): BelongsToMany;
}
