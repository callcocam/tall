<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

use Symfony\Component\Finder\Finder;

class RouteServiceProvider extends ServiceProvider
{

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
       
        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(__DIR__.'/../../routes/api.php');

            Route::middleware(['web'])
                ->namespace($this->namespace)
                ->group(__DIR__.'/../../routes/web.php');

            Route::middleware(['web'])
                ->namespace($this->namespace)
                ->group(function(){                    
                    if(config('tall.generate.route.site', true)){
                        if(is_dir(app_path('Http/Livewire/Paginas'))){
                            $this->configureDynamicRoute(app_path('Http/Livewire/Paginas'));
                        }
                    }
                });

            Route::middleware([
                'web',
                'auth:sanctum',
                config('jetstream.auth_session'),
                'verified'
            ])
            //->name('admin.')
            ->prefix('admin')
            ->group(function(){
                $this->configureDynamicRoute(sprintf("%s/Http/Livewire/Admin",dirname(__DIR__,1)),'src','\\Tall');
                if(config('tall.generate.route.admin', true)){
                    if(is_dir(app_path('Http/Livewire/Admin'))){
                        $this->configureDynamicRoute(app_path('Http/Livewire/Admin'));
                    }
                }
            });

        });
    }

    
    /**
     * Configure the routes for the application.
     *
     * @return void
     */
    public static function configureDynamicRoute($path,$search="app", $ns = "\\App")
    {
           
        foreach ((new Finder)->in($path) as $component) {                   
            $componentPath = $component->getRealPath();        
            $namespace = Str::after($componentPath, $search);
            $namespace = Str::replace(['/', '.php'], ['\\', ''], $namespace);
            $component = $ns . $namespace;
            if (class_exists($component)) {
                if (method_exists($component, 'route')) {                   
                    $comp =  app($component);
                    $comp ->route();
                }
            }
        }
    }

}
