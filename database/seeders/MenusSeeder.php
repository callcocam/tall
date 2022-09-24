<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class MenusSeeder extends Seeder
{
  private $i= [];
  
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {      
      \DB::connection('landlord')->table('sub_menu_tenant')->delete();
      \DB::connection('landlord')->table('sub_menu_orderings')->delete();
      \DB::connection('landlord')->table('sub_menus')->delete();
      \DB::connection('landlord')->table('menus')->delete();
  
      $tenants =  \DB::connection('backup')->table('companies')
      // ->where('id','3')
      ->get();      
      if($tenants){
        foreach ($tenants as  $tenant) {         
          if($currentTenant = \App\Models\CurrentTenant::query()->where('parent',data_get($tenant,'id'))->first()){
              $this->bkMenuCreate($tenant, $currentTenant);
            }
        }
      }
    }

    private function bkMenuCreate($tenant, $currentTenant){
     
      $menus =  \DB::connection('backup')->table('menus')
      ->where('company_id',data_get($tenant,'id'))->get();
        foreach ($menus as  $menu) {
          if( $data = \DB::connection('landlord')->table('menus')->where('name',data_get($menu,'name'))->first()){
            $roleId = data_get($data, 'id');
            $this->bkSubMenuCreate($data,$currentTenant,$menu);
           }
           else{
                $menuId = \Ramsey\Uuid\Uuid::uuid4();
                $data = [
                  'id' => $menuId,
                  'name' => data_get($menu,'name'),
                  'slug' => \Str::slug(data_get($menu,'name')),
                  'description'=> data_get($menu,'description'),
                  'ordering'=> data_get($menu,'ordering'), 
                  'status' => data_get($menu,'status') ? 'published':'draft',
                  'created_at'=>data_get($menu,'created_at'),
                  'updated_at'=>data_get($menu,'updated_at'),
                ];
                \DB::connection('landlord')->table('menus')->insert($data); 
                $this->bkSubMenuCreate($data,$currentTenant,$menu);
            }
        }

    }
    
    private function bkSubMenuCreate($data,$currentTenant,$menu){
     // if( $existMenu = \DB::connection('backup')->table('menus')->where('name',data_get($menu,'name'))->pluck('id','id')){
        if( $existSubMenus = \DB::connection('backup')->table('sub_menus')->whereNull('parent')->where('menu_id',data_get($menu,'id'))->get()){
               foreach ($existSubMenus as $value) {
                  $menuId = $this->addSubMenu($value,$data,\Ramsey\Uuid\Uuid::uuid4(),$currentTenant);
                  if( $existSubMenusParent = \DB::connection('backup')->table('sub_menus')->where('parent',data_get($value,'id'))->where('menu_id',data_get($menu,'id'))->get()){
                    if( $existSubMenusParent->count()){
                      foreach ($existSubMenusParent as $submenu) {
                         $menuSubId = \Ramsey\Uuid\Uuid::uuid4();
                         $this->addSubMenu($submenu,$data,$menuSubId, $currentTenant,$menuId);
                      }   
                    }         
                 }
               }               
            }
       // }
    }

    private function addSubMenu($value,$data,$menuSubId,$currentTenant, $parent=null)
    {      
      if( $existMenuNovo = \DB::connection('landlord')->table('sub_menus')
      ->where('menu_id',data_get($data,'id'))
      ->where('name',data_get($value,'name'))
      ->first()){
          $menuSubId = data_get($existMenuNovo, 'id');
       }
       else{
          \DB::connection('landlord')->table('sub_menus')->insert([
              'id' => $menuSubId,
              'menu_id' =>data_get($data,'id'),
              'name' => data_get($value,'name'),
              'sub_menu_id' => $parent,
              'assets' => data_get($value,'assets'),
              'slug' => data_get($value,'slug'),
              'link'=> data_get($value,'link'),
              'icone'=> data_get($value,'icone'),
              'attributes'=> data_get($value,'attributes'),
              'description'=> data_get($value,'description'),
              'ordering'=> data_get($value,'ordering'), 
              'sibling'=> data_get($value,'sibling'), 
              'status' => data_get($value,'status') ? 'published':'draft',
              'created_at'=>data_get($value,'created_at',now()->format('Y-m-d H:i:s')),
              'updated_at'=>data_get($value,'updated_at',now()->format('Y-m-d H:i:s')),
          ]); 
        }

        if( !\DB::connection('landlord')->table('sub_menu_tenant')->where([
              'sub_menu_id' =>  $menuSubId,
              'tenant_id' =>data_get($currentTenant, 'id'),
        ])->first()){
              $this->i[] = data_get($currentTenant, 'id');
              \DB::connection('landlord')->table('sub_menu_tenant')->insert([
                  'sub_menu_id' =>  $menuSubId,
                  'tenant_id' =>data_get($currentTenant, 'id'),       
                  'created_at'=>now()->format('Y-m-d H:i:s'),
                  'updated_at'=>now()->format('Y-m-d H:i:s'),
              ]);  
        } 
        if( !\DB::connection('landlord')->table('sub_menu_orderings')->where([
          'sub_menu_id' =>  $menuSubId,
          'tenant_id' =>data_get($currentTenant, 'id'),                  
          'menu_id' =>data_get($data,'id',null),  
        ])->first()){
          \DB::connection('landlord')->table('sub_menu_orderings')->insert([
            'id' =>   \Ramsey\Uuid\Uuid::uuid4(),
            'sub_menu_id' =>  $menuSubId,
            'tenant_id' =>data_get($currentTenant, 'id'),                  
            'menu_id' =>data_get($data,'id',null),  
            'parent_sub_menu_id' => $parent,  
            'ordering'=> data_get($value,'ordering'), 
            'created_at'=>now()->format('Y-m-d H:i:s'),
            'updated_at'=>now()->format('Y-m-d H:i:s'),
          ]);  
        }
        return $menuSubId;
    }
}