<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

      $host = \Str::replace("www.",'',request()->getHost());
        $id =  \Ramsey\Uuid\Uuid::uuid4();
      \DB::table('tenants')->insert([
        'id' => $id,
        'name' => "Sistema Integrado De Gerenciamento E Administração",
        'slug' => "sistema-integrado-de-gerenciamento-e-administracao",
        'domain'=> $host,
        'email' => "contato@bengs.com.br",
        'description' => 'Sistema Integrado De Gerenciamento E Administração',
        'status' => 'published',
        'created_at'=>today()->format('Y-m-d H:i:s'),
        'updated_at'=>today()->format('Y-m-d H:i:s')
    ]);

    //   $tenant =  \App\Models\Tenant::factory()->create([
    //         'name'=> 'Base',
    //         'domain'=> $host,
    //         'database'=>env("DB_DATABASE","landlord"),
    //         'prefix'=>'admin',
    //         'middleware'=>'landlord',
    //         'provider'=>'mysql',
    //     ]);

        \App\Models\User::query()->forceDelete();
        $user =   \App\Models\User::factory()->create([
            'tenant_id' =>  $id,
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        \App\Models\Role::query()->forceDelete();
        $role =  \App\Models\Role::factory()->create([
            'tenant_id' =>  $id,
            'name' => 'Super Admin',
            'slug' => 'super-admin',
            'special'=>'all-access'
        ]);
        $user->roles()->sync([$role->id->toString()]);

        \App\Models\User::factory(100)->create([
            'tenant_id' =>  $id,
        ]);
  

        $menu =  \App\Models\Menu::factory()->create([
            'tenant_id' =>  $id,
            'name' => 'Menu Admin',
            'slug' => 'menu-admin'
        ]);
        $menu->sub_menus()->create([
            'tenant_id' =>  $id,
            'assets'=>'menus',
            'name' => 'Home',
            'slug' => 'dashboard',
            'link' => null,
            'icone' => 'home',
            'attributes' => null,
            'description' => null,
            'ordering' => 1,
            'sibling' => null,
            'status' =>'published'
         ]);

       $operacional = $menu->sub_menus()->create([
                        'tenant_id' =>  $id,
                        'assets'=>'menus',
                        'name' => 'Operacional',
                        'slug' => 'operacional',
                        'link' => null,
                        'icone' => 'cog',
                        'attributes' => null,
                        'description' => null,
                        'ordering' => 2,
                        'sibling' => null,
                        'status' =>'published'
                     ]);

        $operacional->sub_menus()->create([
            'tenant_id' =>  $id,
            'assets'=>'menus',
            'name' => 'Usuários',
            'slug' => 'admin.users',
            'link' => null,
            'icone' => 'chevron-right',
            'attributes' => null,
            'description' => null,
            'ordering' => 3,
            'sibling' => null,
            'status' =>'published'
        ]);
        $operacional->sub_menus()->create([
            'tenant_id' =>  $id,
            'assets'=>'menus',
            'name' => 'Controle De Acesso',
            'slug' => 'admin.roles',
            'link' => null,
            'icone' => 'chevron-right',
            'attributes' => null,
            'description' => null,
            'ordering' => 4,
            'sibling' => null,
            'status' =>'published'
        ]);
        $operacional->sub_menus()->create([
            'tenant_id' =>  $id,
            'assets'=>'menus',
            'name' => 'Permissões',
            'slug' => 'admin.permissions',
            'link' => null,
            'icone' => 'chevron-right',
            'attributes' => null,
            'description' => null,
            'ordering' => 5,
            'sibling' => null,
            'status' =>'published'
        ]);
        $operacional->sub_menus()->create([
            'tenant_id' =>  $id,
            'assets'=>'menus',
            'name' => 'Menus',
            'slug' => 'admin.menus',
            'link' => null,
            'icone' => 'chevron-right',
            'attributes' => null,
            'description' => null,
            'ordering' => 6,
            'sibling' => null,
            'status' =>'published'
        ]);
        $operacional->sub_menus()->create([
            'tenant_id' =>  $id,
            'assets'=>'menus',
            'name' => 'Sub menus',
            'slug' => 'admin.sub-menus',
            'link' => null,
            'icone' => 'chevron-right',
            'attributes' => null,
            'description' => null,
            'ordering' => 7,
            'sibling' => null,
            'status' =>'published'
        ]);

    }
}
