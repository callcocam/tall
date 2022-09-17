<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;
use Livewire\LivewireBladeDirectives;
use Illuminate\Support\Facades\Schema;

class TallServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\Tall\Tenant\TenantServiceProvider::class);
        $this->app->register(\Tall\Models\Auth\Acl\AclServiceProvider::class);
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Ui', \Tall\Facades\Ui::class);    
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    { 
        include_once __DIR__ . '/../../helpers.php';
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/tall.php','tall'
        );
        
      
        if ($this->app->runningInConsole()) {
           $this->commands([
                    \Tall\Console\Commands\InstallCommand::class,
                    \Tall\Console\Commands\PageCommand::class,
                    \Tall\Console\Commands\CategoryCommand::class,
                    \Tall\Console\Commands\TableCommand::class,
                    \Tall\Console\Commands\CreateCommand::class,
                    \Tall\Console\Commands\CrudCommand::class,
                    \Tall\Console\Commands\DeleteCommand::class,
                    \Tall\Console\Commands\EditCommand::class,
                    \Tall\Console\Commands\ShowCommand::class
                ]);
        }
        if (Schema::hasTable('menus')) {  
            $builder = null;
            
            if($menu = \App\Models\Menu::query()->where([
                'slug' => config('tall.menu.admin', 'menu-admin'),
            ])->first()){
                $builder =  $menu->sub_menus();   
            }
            $this->app->instance('currentMenuAdmin', $builder);
            
            $builder = null;

            if($menu = \App\Models\Menu::query()->where([
                'slug' => config('tall.menu.site', 'menus-site'),
            ])->first()){
                $builder =  $menu->sub_menus();   
            }
            $this->app->instance('currentMenuSite', $builder);
        }

        
        $this->registerBladeDirectives();
        $this->registerBladeComponents();
        $this->publishMigrations();
        $this->loadMigrations();
        $this->publishViews();
        $this->loadComponent('table.breadcrumbs');
        $this->loadComponent('table.filters.clear');
        $this->loadComponent('table.filters.select');
        $this->loadComponent('table.filters.status');
        $this->loadComponent('table.search');
        $this->loadComponent('table.sort');
        $this->loadComponent('table.status');
        $this->loadComponent('table.actions');
        $this->loadComponent('table.empty');
        $this->loadComponent('table.add');
        
        $this->createDirectives();

        
        if (class_exists(Livewire::class)) {
            Livewire::component( 'tall::includes.admin.sidebar.mobile.nav-component', \Tall\Http\Livewire\Includes\Admin\Sidebar\Mobile\NavComponent::class);
            Livewire::component( 'tall::includes.admin.sidebar.mobile.account-component', \Tall\Http\Livewire\Includes\Admin\Sidebar\Mobile\AccountComponent::class);
            Livewire::component( 'tall::includes.admin.sidebar.nav-component', \Tall\Http\Livewire\Includes\Admin\Sidebar\NavComponent::class);
            Livewire::component( 'tall::includes.admin.sidebar.account-component', \Tall\Http\Livewire\Includes\Admin\Sidebar\AccountComponent::class);
            Livewire::component( 'tall::includes.admin.header.search-component', \Tall\Http\Livewire\Includes\Admin\Header\SearchComponent::class);
            Livewire::component( 'tall::includes.admin.header-component', \Tall\Http\Livewire\Includes\Admin\Header\HeaderComponent::class);
            
            Livewire::component( 'tall::admin.operacional.tenant.show-component', \Tall\Http\Livewire\Admin\Operacional\Tenant\ShowComponent::class);

           
           
           
            Livewire::component( 'tall::admin.dashboard-component', \Tall\Http\Livewire\Admin\DashboardComponent::class);
            Livewire::component( 'tall::admin.operacional.users.list-component', \Tall\Http\Livewire\Admin\Operacional\Users\ListComponent::class);
            Livewire::component( 'tall::admin.operacional.users.edit-component', \Tall\Http\Livewire\Admin\Operacional\Users\EditComponent::class);
            Livewire::component( 'tall::admin.operacional.users.create-component', \Tall\Http\Livewire\Admin\Operacional\Users\CreateComponent::class);
            Livewire::component( 'tall::admin.operacional.users.show-component', \Tall\Http\Livewire\Admin\Operacional\Users\ShowComponent::class);
            Livewire::component( 'tall::admin.operacional.users.delete-component', \Tall\Http\Livewire\Admin\Operacional\Users\DeleteComponent::class);
           
           
            Livewire::component( 'tall::admin.operacional.profile.show-component', \Tall\Http\Livewire\Admin\Operacional\Profile\ShowComponent::class);
            Livewire::component( 'tall::admin.operacional.profile.update-profile-information-form', \Tall\Http\Livewire\Admin\Operacional\Profile\UpdateProfileInformationForm::class);
            Livewire::component( 'tall::admin.operacional.profile.update-password-form', \Tall\Http\Livewire\Admin\Operacional\Profile\UpdatePasswordForm::class);
            Livewire::component( 'tall::admin.operacional.profile.two-factor-authentication-form', \Tall\Http\Livewire\Admin\Operacional\Profile\TwoFactorAuthenticationForm::class);
            Livewire::component( 'tall::admin.operacional.profile.logout-other-browser-sessions-form', \Tall\Http\Livewire\Admin\Operacional\Profile\LogoutOtherBrowserSessionsForm::class);
            Livewire::component( 'tall::admin.operacional.profile.delete-user-form', \Tall\Http\Livewire\Admin\Operacional\Profile\DeleteUserForm::class);

            Livewire::component( 'tall::admin.operacional.tenants.list-component', \Tall\Http\Livewire\Admin\Operacional\Tenants\ListComponent::class);
            Livewire::component( 'tall::admin.operacional.tenants.edit-component', \Tall\Http\Livewire\Admin\Operacional\Tenants\EditComponent::class);
            Livewire::component( 'tall::admin.operacional.tenants.create-component', \Tall\Http\Livewire\Admin\Operacional\Tenants\CreateComponent::class);
            Livewire::component( 'tall::admin.operacional.tenants.show-component', \Tall\Http\Livewire\Admin\Operacional\Tenants\ShowComponent::class);
            Livewire::component( 'tall::admin.operacional.tenants.delete-component', \Tall\Http\Livewire\Admin\Operacional\Tenants\DeleteComponent::class);
            
            Livewire::component( 'tall::admin.operacional.roles.list-component', \Tall\Http\Livewire\Admin\Operacional\Roles\ListComponent::class);
            Livewire::component( 'tall::admin.operacional.roles.edit-component', \Tall\Http\Livewire\Admin\Operacional\Roles\EditComponent::class);
            Livewire::component( 'tall::admin.operacional.roles.create-component', \Tall\Http\Livewire\Admin\Operacional\Roles\CreateComponent::class);
            Livewire::component( 'tall::admin.operacional.roles.show-component', \Tall\Http\Livewire\Admin\Operacional\Roles\ShowComponent::class);
            Livewire::component( 'tall::admin.operacional.roles.delete-component', \Tall\Http\Livewire\Admin\Operacional\Roles\DeleteComponent::class);
            
            Livewire::component( 'tall::admin.operacional.permissions.list-component', \Tall\Http\Livewire\Admin\Operacional\Permissions\ListComponent::class);
            Livewire::component( 'tall::admin.operacional.permissions.edit-component', \Tall\Http\Livewire\Admin\Operacional\Permissions\EditComponent::class);
            Livewire::component( 'tall::admin.operacional.permissions.create-component', \Tall\Http\Livewire\Admin\Operacional\Permissions\CreateComponent::class);
            Livewire::component( 'tall::admin.operacional.permissions.show-component', \Tall\Http\Livewire\Admin\Operacional\Permissions\ShowComponent::class);
            Livewire::component( 'tall::admin.operacional.permissions.delete-component', \Tall\Http\Livewire\Admin\Operacional\Permissions\DeleteComponent::class);

            
            Livewire::component( 'tall::admin.operacional.menus.list-component', \Tall\Http\Livewire\Admin\Operacional\Menus\ListComponent::class);
            Livewire::component( 'tall::admin.operacional.menus.edit-component', \Tall\Http\Livewire\Admin\Operacional\Menus\EditComponent::class);
            Livewire::component( 'tall::admin.operacional.menus.create-component', \Tall\Http\Livewire\Admin\Operacional\Menus\CreateComponent::class);
            Livewire::component( 'tall::admin.operacional.menus.show-component', \Tall\Http\Livewire\Admin\Operacional\Menus\ShowComponent::class);
            Livewire::component( 'tall::admin.operacional.menus.delete-component', \Tall\Http\Livewire\Admin\Operacional\Menus\DeleteComponent::class);
            Livewire::component( 'tall::admin.operacional.menus.group.add-component', \Tall\Http\Livewire\Admin\Operacional\Menus\Group\AddComponent::class);
            Livewire::component( 'tall::admin.operacional.menus.group.items.add-component', \Tall\Http\Livewire\Admin\Operacional\Menus\Group\Items\AddComponent::class);
            Livewire::component( 'tall::admin.operacional.menus.group.items.edit-component', \Tall\Http\Livewire\Admin\Operacional\Menus\Group\Items\EditComponent::class);
            Livewire::component( 'tall::admin.operacional.menus.group.items.delete-component', \Tall\Http\Livewire\Admin\Operacional\Menus\Group\Items\DeleteComponent::class);
            Livewire::component( 'tall::admin.operacional.menus.groups-component', \Tall\Http\Livewire\Admin\Operacional\Menus\GroupsComponent::class);
            Livewire::component( 'tall::admin.operacional.menus.items-component', \Tall\Http\Livewire\Admin\Operacional\Menus\ItemsComponent::class);

            
            Livewire::component( 'tall::admin.operacional.menus.sub-menus.list-component', \Tall\Http\Livewire\Admin\Operacional\Menus\SubMenus\ListComponent::class);
            Livewire::component( 'tall::admin.operacional.menus.sub-menus.edit-component', \Tall\Http\Livewire\Admin\Operacional\Menus\SubMenus\EditComponent::class);
            Livewire::component( 'tall::admin.operacional.menus.sub-menus.create-component', \Tall\Http\Livewire\Admin\Operacional\Menus\SubMenus\CreateComponent::class);
            Livewire::component( 'tall::admin.operacional.menus.sub-menus.show-component', \Tall\Http\Livewire\Admin\Operacional\Menus\SubMenus\ShowComponent::class);
            Livewire::component( 'tall::admin.operacional.menus.sub-menus.delete-component',  \Tall\Http\Livewire\Admin\Operacional\Menus\SubMenus\DeleteComponent::class);
          
          
            Livewire::component( 'tall::site.dash-board-component',\Tall\Http\Livewire\Site\DashBoardComponent::class);
            Livewire::component( 'tall::includes.site.nav.desktop-component',\Tall\Http\Livewire\Includes\Site\Nav\DesktopComponent::class);
            Livewire::component( 'tall::includes.site.nav.desktop-item-component',\Tall\Http\Livewire\Includes\Site\Nav\DesktopItemComponent::class);
            Livewire::component( 'tall::includes.site.nav.mobile-component',\Tall\Http\Livewire\Includes\Site\Nav\MobileComponent::class);
            Livewire::component( 'tall::includes.site.nav.mobile-item-component',\Tall\Http\Livewire\Includes\Site\Nav\MobileItemComponent::class);
            Livewire::component( 'tall::includes.site.footer-component',\Tall\Http\Livewire\Includes\Site\FooterComponent::class);
           
            $this->app->register(RouteServiceProvider::class);     
     
        }

    }

    
    public function loadComponent($component, $alias=null){
        if ($alias == null){
            $alias=$component;
        }
        Blade::component("tall::components.{$component}",'tall-'.$alias);
    }

    
    protected function registerBladeDirectives(): void
    {
       
        Blade::directive('toJs', static function ($expression): string {
            return LivewireBladeDirectives::js($expression);
        });
    }

    protected function registerBladeComponents(): void
    {
        $this->callAfterResolving(BladeCompiler::class, static function (BladeCompiler $blade): void {
            foreach (config('tall.components') as $component) {
                $blade->component($component['class'], $component['alias']);
            }
        });
    }
    
      /**
     * Publish the migration files.
     *
     * @return void
     */
    protected function publishMigrations()
    {
        $this->publishes([
            __DIR__.'/../../database/migrations/' => database_path('migrations'),
            __DIR__.'/../../database/factories/' => database_path('factories'),
            __DIR__.'/../../database/seeders/' => database_path('seeders'),
        ], 'tall-migrations');
    }

    /**
     * Load our migration files.
     *
     * @return void
     */
    protected function loadMigrations()
    {
        if (config('tall.migrate', true)) {
            $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        }
    }

    private function publishViews(): void
    {
        $pathViews = __DIR__ . '/../../resources/views';
        $this->loadViewsFrom($pathViews, 'tall');
        Blade::anonymousComponentNamespace(__DIR__ . '/../../resources/views/components', 'tall');
        if(is_dir(resource_path('views/vendor/tall')))
        {
            $pathViews = resource_path('views/vendor/tall');
            $this->loadViewsFrom($pathViews, 'tall');
            Blade::anonymousComponentNamespace(resource_path('views/vendor/tall/components'), 'tall');
        }

        $this->publishes([         
            __DIR__ . '/../../database/migrations/' => database_path('migrations'),
            __DIR__ . '/../../database/factories/' => database_path('factories'),
            __DIR__ . '/../../database/seeders/' => database_path('seeders'),
        ], 'tall-migrations');

        
        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path('views/vendor/tall'),
            __DIR__ . '/../../resources/css' => resource_path('css'),
            __DIR__ . '/../../resources/js' => resource_path('js'),
            __DIR__ . '/../../resources/lang' => base_path('lang/vendor/tall' ),
        ], 'tall-views');

        
        $this->publishes([         
            __DIR__ . '/../../public/js' => public_path('js'),
            __DIR__ . '/../../public/css' => public_path('css'),
            __DIR__ . '/../../public/img' => public_path('img'),
        ], 'tall-public');

        
        $this->publishes([
            __DIR__ . '/../../stubs' => base_path('stubs' ),
        ], 'tall-stubs');

        
        $this->publishes([
            __DIR__ . '/../../config/tall.php' => config_path('tall.php'),
        ], 'tall-config');
        
        $this->publishes([         
            __DIR__ . '/../../package.json' => base_path('package.json'),
        ], 'tall-package');
        
        $this->publishes([         
            __DIR__ . '/../../package.json' => base_path('package.json'),
        ], 'tall-vite');

        $this->publishes([
            __DIR__ . '/../../database/migrations/' => database_path('migrations'),
            __DIR__ . '/../../database/factories/' => database_path('factories'),
            __DIR__ . '/../../database/seeders/' => database_path('seeders'),
            __DIR__ . '/../../resources/views' => resource_path('views/vendor/tall'),
            __DIR__ . '/../../resources/css' => resource_path('css'),
            __DIR__ . '/../../resources/js' => resource_path('js'),
            __DIR__ . '/../../resources/lang' => base_path('lang/vendor/tall' ),
            __DIR__ . '/../../stubs' => base_path('stubs' ),
            __DIR__ . '/../../config/tall.php' => config_path('tall.php'),
            __DIR__ . '/../../vite.config.js' => base_path('vite.config.js'),
            __DIR__ . '/../../package.json' => base_path('package.json'),
            __DIR__ . '/../../public/js' => public_path('js'),
            __DIR__ . '/../../public/css' => public_path('css'),
            __DIR__ . '/../../public/img' => public_path('img'),
        ], 'tall');

    }

    private function createDirectives(): void
    {
        Blade::directive('tallNotifications', function () {
            return "<?php echo view('tall::includes.global.notifications')->render(); ?>";
        });
    }
}
