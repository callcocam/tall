<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Models;

use App\Models\User;
use Tall\Tenant\Models\Concerns\UsesTenantConnection;

class UserTenant extends User
{
    use UsesTenantConnection;
    
    protected $table = "users";
}
