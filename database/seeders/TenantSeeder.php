<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class TenantSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $clone = config('database.connections.mysql');
      $clone['database'] = 'mysql';
      Config::set("database.connections.mysql", $clone);
  
      $tenants =  DB::connection('backup')->table('companies')->get();

      
      if($tenants){
        foreach ($tenants as  $tenant) {         
          if($currentTenant = \App\Models\CurrentTenant::query()->where('parent',data_get($tenant,'id'))->first()){
             $this->bkUserCreate($tenant, $currentTenant);
            }
        }
      }

    }

    private function bkUserCreate($tenant, $currentTenant){
      $users =  DB::connection('backup')->table('users')
      ->select('name', 'email', 'assets','slug', 'document', 'vereador_old_id','profession','genre','nationality','date_birth', 'office','password')
      ->where('company_id',data_get($tenant,'id'))->get();
        foreach ($users as  $user) {
          $userId = \Ramsey\Uuid\Uuid::uuid4();
          DB::connection('mysql')->table('users')->insert([
            'id' => $userId,
            'tenant_id' => data_get($currentTenant,'id'),
            'name' => data_get($user,'name'),
            'slug' => data_get($user,'slug'),
            'assets'=> data_get($user,'assets'),
            'document'=> data_get($user,'document'),
            'cover'=> data_get($user,'cover'),
            'email' => data_get($user,'email'),
            'password' => data_get($user,'password', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
            'status' => 'published',
            'created_at'=>data_get($user,'created_at'),
            'updated_at'=>data_get($user,'updated_at'),
          ]);           
          DB::connection('mysql')->table('user_infos')->insert([
            'id' => \Ramsey\Uuid\Uuid::uuid4(),
            'user_id' => $userId,
            'office' => data_get($user,'office'),
            'profession' => data_get($user,'profession'),
            'vereador_old_id'=> data_get($user,'vereador_old_id'),
            'genre'=> data_get($user,'genre'),
            'formations' => data_get($user,'formations'),
            'date_birth' => data_get($user,'date_birth'),
            'nationality' => data_get($user,'nationality'),
          ]);           
        }

    }
}