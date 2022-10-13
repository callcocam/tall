<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Tenant\Models\Concerns;

use Tall\Models\Tenant;

trait UsesTenantModel
{
    public function getTenantModel(): Tenant
    {
        $tenantModelClass = config('tall.multitenancy.tenant_model');

        return new $tenantModelClass();
    }
}
