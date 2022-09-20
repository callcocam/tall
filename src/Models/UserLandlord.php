<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Models;

use App\Models\User;
use Tall\Tenant\Models\Concerns\UsesLandlordConnection;

class UserLandlord extends User
{
    use UsesLandlordConnection;
    
    protected $table = "users";
}
