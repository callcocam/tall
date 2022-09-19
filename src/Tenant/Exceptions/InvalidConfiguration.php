<?php

namespace Tall\Tenant\Exceptions;

use Exception;

class InvalidConfiguration extends Exception
{
    public static function tenantConnectionDoesNotExist(string $expectedConnectionName): self
    {
        return new static("Could not find a tenant connection named `{$expectedConnectionName}`. Make sure to create a connection with that name in the `connections` key of the `database` config file.");
    }

    public static function tenantConnectionIsEmptyOrEqualsToLandlordConnection(): self
    {
        return new static("`SwitchTenantDatabaseTask` fails because `tall.multitenancy.tenant_database_connection_name` is `null` or equals to `tall.multitenancy.landlord_database_connection_name`.");
    }

    public static function invalidAction(string $actionName, string $configuredClass, string $actionClass): self
    {
        return new static("The class currently specified in the `tall.multitenancy.actions.{$actionName}` key '{$configuredClass}' should be or extend `{$actionClass}`.");
    }
}
