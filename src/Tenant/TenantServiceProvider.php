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
            $this->app->bind(Multitenancy::class, fn ($app) => new Multitenancy($app));
            app(Multitenancy::class)->start();
             $containerKey = config('tall.multitenancy.current_tenant_container_key', 'currentTenant');
            
            try {
                if (!app()->has($containerKey)):
                    die(response("Nenhuma empresa cadastrada com esse endereço " . str_replace("admin.", "", request()->getHost()), 401));

                endif;
                $this->tenant = app()->get($containerKey);
                if (!$this->tenant):
                    die(response("Nenhuma empresa cadastrada com esse endereço " . str_replace("admin.", "", request()->getHost()), 401));

                endif;
                TenantFacade::addTenant(config('tall.multitenancy.current_tenant_key', 'tenant_id'), $this->tenant->id);
            } catch (\PDOException $th) {

                throw $th;

            }
        }
    }

    // The function uses the reflection class that is built into PHP!!!
    // The purpose is to determine the type of a certain method that exi
    private function is_class_method($type="public", $method, $class) {
        // $type = mb_strtolower($type);
         $refl = new \ReflectionMethod($class, $method);
         switch($type) {
             case "static":
             return $refl->isStatic();
             break;
             case "public":
             return $refl->isPublic();
             break;
             case "private":
             return $refl->isPrivate();
             break;
         }
     }
}
