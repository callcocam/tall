<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Tenant\Actions;

use Tall\Tenant\Events\MadeTenantCurrentEvent;
use Tall\Tenant\Events\MakingTenantCurrentEvent;
use Tall\Models\Tenant;
use Tall\Tenant\Tasks\SwitchTenantTask;
use Tall\Tenant\Tasks\TasksCollection;

class MakeTenantCurrentAction
{

    public function execute(Tenant $tenant)
    {
       $this
            ->bindAsCurrentTenant($tenant);


        return $this;
    }
    
    protected function bindAsCurrentTenant(Tenant $tenant): self
    {
        $containerKey = config('tall.multitenancy.current_tenant_container_key');

        app()->forgetInstance($containerKey);

        app()->instance($containerKey, $tenant);

        return $this;
    }
}
