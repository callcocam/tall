<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Tenant\Facades;

use Tall\Tenant\TenantManager;
use Illuminate\Support\Facades\Facade;

class Tenant extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return TenantManager::class;
    }
}
