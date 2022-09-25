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
use Illuminate\Support\Facades\Schema;

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
        //pegar a conexão de acordo com o tenant
        $clone = config('database.connections.mysql');
        $clone['database'] = $tenant->database;
        \Config::set("database.connections.{$tenant->database}", $clone);
       //pastas para ler os compnent livewire padrão e geração de rotas
       if(!is_array(config("tall.multitenancy.path"))){
            $paths = config('tall.multitenancy.paths',[
                'landlord'=>'/Http/Livewire/Landlord',
                'admin'=>'/Http/Livewire/Admin',
            ]);
            \Config::set("tall.multitenancy.path",  data_get($paths,$tenant->prefix));
            //prefix da rota da administração
            \Config::set("tall.multitenancy.prefix",  $tenant->prefix);
        }
        //Alteramos a model do user
        if($provider = \Config::get("tall.multitenancy.providers.users.model.{$tenant->provider}")){
            $clone = config('auth.providers.users');
            $clone['model'] = $provider;        
            \Config::set("auth.providers.users", $clone);
        }
        \Config::set("app.name", $tenant->name);

        if (Schema::connection(config('tall.multitenancy.landlord_database_connection_name','landlord'))->hasTable('menus')) {  
            $builder = null;
            if(class_exists(\App\Models\Menu::class)){
                $menus = \App\Models\Menu::query()->get();
            }
            else{
                $menus = \Tall\Models\Menu::query()->get();
            }
            if($menus){
               foreach ($menus as  $menu) {
                if(method_exists($tenant, 'sub_menu_orderings')){
                    \Config::set('tall.selecttenant', $tenant->database == config('tall.multitenancy.landlord_database_connection_name','landlord'));                   
                    if($tenant_id = request()->query('tenant')){
                        if($tenant = \Tall\Models\CurrentTenant::find($tenant_id)){   
                         $builder= $tenant->sub_menu_orderings()        
                            ->where('menu_id',$menu->id);
                          }
                    }
                    else{
                        $builder =  $tenant->sub_menu_orderings()        
                        ->where('menu_id',$menu->id);   
                    }

                }else{
                    if($menu->sub_menus){
                        $builder =  $menu->sub_menus();   
                    }
                }
                app()->instance($menu->slug, $builder);
               }
            }
        }
        return $this;
    }
}
