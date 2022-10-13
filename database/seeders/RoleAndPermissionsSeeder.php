<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleAndPermissionsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
  
    

      
      $this->bkRoleCreate();
      //$this->bkPermissionCreate();

    }

    
    private function bkRoleCreate(){
      
      $roles =  \DB::connection('backup')->table('role_user')
      ->join('roles', function ($join) {
        $join->on('role_user.role_id', '=', 'roles.id');
      })
      ->join('users', function ($join) {
        $join->on('role_user.user_id', '=', 'users.id');
      })
      ->select('users.email', 'roles.id','roles.alias','roles.name','roles.is_admin', 'roles.description','role_user.user_id','role_user.role_id')
      ->get();     
        foreach ($roles as  $role) {
           if( $existRole = \DB::connection('landlord')->table('roles')->where('slug',data_get($role,'alias'))->first()){
            $roleId = data_get($existRole, 'id');
           }
           else{
            $roleId = \Ramsey\Uuid\Uuid::uuid4();
            \DB::connection('landlord')->table('roles')->insert([
              'id' => $roleId,
              'name' => data_get($role,'name'),
              'slug' => data_get($role,'alias'),
              'special'=> data_get($role,'is_admin') ? 'all-access':'no-access',
              'description'=> data_get($role,'description'),
              'status' => data_get($role,'status') ? 'published':'draft',
              'created_at'=>data_get($role,'created_at'),
              'updated_at'=>data_get($role,'updated_at'),
            ]);     

          }
          if( $existUser = \DB::connection('mysql')->table('users')->where('email',data_get($role,'email'))->first()){
              \DB::connection('landlord')->table('role_user')->insert([
                'user_id' =>  data_get($existUser, 'id'),
                'role_id' =>$roleId,
                'created_at'=>data_get($role,'created_at'),
                'updated_at'=>data_get($role,'updated_at'),
              ]);          
           }
        }
    }

    private function bkPermissionCreate(){
      
      $permissions =  \DB::connection('backup')->table('permission_role')
      ->join('roles', function ($join) {
        $join->on('permission_role.role_id', '=', 'roles.id');
      })
      ->join('permissions', function ($join) {
        $join->on('permission_role.permission_id', '=', 'permissions.id');
      })
      ->select('permissions.name', 'permissions.id','permissions.alias','permissions.action','permissions.description', 'roles.id', 'roles.alias as slug','permission_role.permission_id','permission_role.role_id')
      ->get();     
        foreach ($permissions as  $permission) {
        
           if( $existPermission = \DB::connection('landlord')->table('permissions')->where('slug',data_get($permission,'alias'))->first()){
            $permissionId = data_get($existPermission, 'id');
           }
           else{
            $permissionId = \Ramsey\Uuid\Uuid::uuid4();
            \DB::connection('landlord')->table('permissions')->insert([
              'id' => $permissionId,
              'name' => data_get($permission,'name'),
              'slug' => data_get($permission,'alias'),
              'group'=> data_get($permission,'action') ,
              'description'=> data_get($permission,'description'),
              'status' => data_get($permission,'status') ? 'published':'draft',
              'created_at'=>data_get($permission,'created_at',now()->format('Y-m-d H:i:s')),
              'updated_at'=>data_get($permission,'updated_at',now()->format('Y-m-d H:i:s')),
            ]);     

          }
          if( $existRole = \DB::connection('landlord')->table('roles')->where('slug',data_get($permission,'slug'))->first()){
                if( !\DB::connection('landlord')->table('permission_role')->where([
                  'role_id' =>  data_get($existRole, 'id'),
                  'permission_id' =>$permissionId,
                ])->first()){
                  \DB::connection('landlord')->table('permission_role')->insert([
                    'role_id' =>  data_get($existRole, 'id'),
                    'permission_id' =>$permissionId,
                    'created_at'=>now()->format('Y-m-d H:i:s'),
                    'updated_at'=>now()->format('Y-m-d H:i:s'),
                  ]);          
              } 
           }
        }
    }
}