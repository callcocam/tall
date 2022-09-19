<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Tenant;

use Illuminate\Contracts\Foundation\Application;
// use Tall\Tenant\Actions\MakeQueueTenantAwareAction;
use Tall\Tenant\Concerns\UsesMultitenancyConfig;
use Tall\Tenant\Models\Concerns\UsesTenantModel;
use Tall\Tenant\Models\Tenant;
// use Tall\Tenant\Tasks\TasksCollection;
use Tall\Tenant\TenantFinder\TenantFinder;

class Multitenancy
{
    use UsesTenantModel;
    use UsesMultitenancyConfig;

    public function __construct(public Application $app)
    {
    }

    public function start(): void
    {
        $this
            ->registerTenantFinder()
            ->registerTasksCollection()
            ->configureRequests()
            ->configureQueue();
    }

    public function end(): void
    {
        Tenant::forgetCurrent();
    }

    protected function determineCurrentTenant(): void
    {
        if (! $this->app['config']->get('tall.multitenancy.tenant_finder')) {
            return;
        }

        /** @var \Tall\Tenant\TenantFinder\TenantFinder $tenantFinder */
        $tenantFinder = $this->app[TenantFinder::class];

        $tenant = $tenantFinder->findForRequest($this->app['request']);

        $tenant?->makeCurrent();
    }

    protected function registerTasksCollection(): self
    {
        $this->app->singleton(TasksCollection::class, function () {
            $taskClassNames = $this->app['config']->get('tall.multitenancy.switch_tenant_tasks');

            return new TasksCollection($taskClassNames);
        });

        return $this;
    }

    protected function registerTenantFinder(): self
    {
        if ($this->app['config']->get('tall.multitenancy.tenant_finder')) {
            $this->app->bind(TenantFinder::class, $this->app['config']->get('tall.multitenancy.tenant_finder'));
        }

        return $this;
    }

    protected function configureRequests(): self
    {
        if (! $this->app->runningInConsole()) {
            $this->determineCurrentTenant();
        }

        return $this;
    }

    protected function configureQueue(): self
    {
        $this
            ->getMultitenancyActionClass(
                actionName: 'make_queue_tenant_aware_action'
            )
            ->execute();

        return $this;
    }
}
