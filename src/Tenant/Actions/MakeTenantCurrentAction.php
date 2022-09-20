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
        $clone = config('database.connections.mysql');
        $clone['database'] = $tenant->database;
        \Config::set("database.connections.{$tenant->database}", $clone);
        \Config::set("tall.multitenancy.prefix",  $tenant->prefix);
        \Config::set("tall.multitenancy.prefix",  $tenant->prefix);
        $clone = config('auth.providers.users');
        $clone['model'] = \Config::get("tall.multitenancy.providers.users.model.{$tenant->provider}");        
        \Config::set("auth.providers.users", $clone);
        return $this;
    }
}
