<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Tenant;

use Illuminate\Support\ServiceProvider;
use App\Models\Tenant;
use Tall\Tenant\Facades\Tenant as TenantFacade;

class TenantServiceProvider extends ServiceProvider
{
    private $tenant;
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        if (function_exists('config_path')) {
            $this->publishes([
                realpath(__DIR__.'/../config/tall.php') => config_path('tall.php'),
            ]);
        }

        $this->loadTenant();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TenantManager::class, function () {
            return new TenantManager();
        });
    }

      /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function loadTenant()
    {
        if ($this->app->runningInConsole()) return;

        if(class_exists(Tenant::class)){
            try {
                $host[] = str_replace(["admin.","www."], ["",""], request()->getHost());
                $host[] = request()->getHost();
                $current_tenant_container_domain = config('tall.current_tenant_container_domain','domain');
                $this->tenant = Tenant::query()->whereIn($current_tenant_container_domain, $host)->first();
                if (!$this->tenant):
                    die(response("Nenhuma empresa cadastrada com esse endereço " . str_replace("admin.", "", request()->getHost()), 401));

                endif;
                TenantFacade::addTenant(config('tall.current_tenant_key', 'tenant_id'), $this->tenant->id);

            $containerKey = config('tall.current_tenant_container_key', 'currentTenant');

            app()->forgetInstance($containerKey);

            app()->instance($containerKey, $this->tenant);

            config([
                'app.name'=> $this->tenant->name,
                'app.url'=> request()->getHost(),
            ]);
            // config([
            //     'lfm.folder_categories.file.folder_name'=> sprintf("files/%s", $this->tenant->id)
            // ]);
            // config([
            //     'lfm.folder_categories.image.folder_name'=> sprintf("photos/%s", $this->tenant->id)
            // ]);
            // config([
            //     'lfm'=> [
            //         'folder_categories'=>[
            //             'file'=>[
            //                 'folder_name'=>sprintf("files/%s", $this->tenant->id)
            //             ],
            //             'image'=>[
            //                 'folder_name'=>sprintf("photos/%s", $this->tenant->id)
            //             ]
            //         ]
            //     ]
            // ]);
            // dd(config('lfm'));
        } catch (\PDOException $th) {

            throw $th;

        }
    }
    }
}
