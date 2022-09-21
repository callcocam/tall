<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    
  
      $tenants =  \DB::connection('backup')->table('companies')->get();
      if($tenants){
        foreach ($tenants as  $tenant) {         
          if($currentTenant = \App\Models\CurrentTenant::query()->where('slug',data_get($tenant,'slug'))->first()){
            $users =  \DB::connection('backup')->table('users')
            ->select('name', 'email', 'assets','slug', 'document', 'password')
            ->where('company_id',data_get($tenant,'id'))->get();
              foreach ($users as  $user) {
                \DB::connection('mysql')->table('users')->insert([
                  'id' => \Ramsey\Uuid\Uuid::uuid4(),
                  'tenant_id' => data_get($currentTenant,'id'),
                  'name' => data_get($user,'name'),
                  'slug' => data_get($user,'slug'),
                  'assets'=> data_get($tenant,'assets'),
                  'document'=> data_get($tenant,'document'),
                  'email' => data_get($user,'email'),
                  'password' => data_get($tenant,'password', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
                  'status' => 'published',
                  'created_at'=>data_get($user,'created_at'),
                  'updated_at'=>data_get($user,'updated_at'),
                ]);           
              }
            }
        }
      }

    }
}
