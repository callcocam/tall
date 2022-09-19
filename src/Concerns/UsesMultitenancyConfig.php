<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Concerns;

use Illuminate\Support\Arr;
use Tall\Exceptions\InvalidConfiguration;

trait Usestall.MultitenancyConfig
{
    public function tenantDatabaseConnectionName(): ?string
    {
        return config('tall.multitenancy.tenant_database_connection_name') ?? config('database.default');
    }

    public function landlordDatabaseConnectionName(): ?string
    {
        return config('tall.multitenancy.landlord_database_connection_name') ?? config('database.default');
    }

    public function currentTenantContainerKey(): string
    {
        return config('tall.multitenancy.current_tenant_container_key');
    }

    public function gettall.MultitenancyActionClass(string $actionName, string $actionClass)
    {
        $configuredClass = config("tall.multitenancy.actions.{$actionName}") ?? $actionClass;

        if (! is_a($configuredClass, $actionClass, true)) {
            throw InvalidConfiguration::invalidAction(
                actionName: $actionName,
                configuredClass: $configuredClass ?? '',
                actionClass: $actionClass
            );
        }

        return app($configuredClass);
    }

    public function getTenantArtisanSearchFields(): array
    {
        return Arr::wrap(config('tall.multitenancy.tenant_artisan_search_fields'));
    }
}