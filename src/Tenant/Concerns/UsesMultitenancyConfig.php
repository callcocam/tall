<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Tenant\Concerns;

use Illuminate\Support\Arr;
use Tall\Exceptions\InvalidConfiguration;


trait UsesMultitenancyConfig
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

    public function getMultitenancyActionClass(string $actionNam)
    {
        $configuredClass = config("tall.multitenancy.actions.{$actionName}");

        if (! $configuredClass) {
            throw InvalidConfiguration::invalidAction(
                actionName: $actionName,
                configuredClass: $configuredClass ?? ''
            );
        }

        return app($configuredClass);
    }

    public function getTenantArtisanSearchFields(): array
    {
        return Arr::wrap(config('tall.multitenancy.tenant_artisan_search_fields'));
    }
}
