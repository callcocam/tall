<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
return [
    'migrate'=>false,
    /*
    |--------------------------------------------------------------------------
    | Deffinir se vai um sistema auto increment
    |--------------------------------------------------------------------------
    */
    'incrementing'=>false,
     /*
    |--------------------------------------------------------------------------
    | Deffinir o tio da chave primaria, string ou int se for auto increment
    |--------------------------------------------------------------------------
    */
    'keyType'=>'string',
    /*
    |--------------------------------------------------------------------------
    | Deffinir a geração de paginas pela slug
    |--------------------------------------------------------------------------
    */
    'generate_route_pages'=> true,
    /*
    |--------------------------------------------------------------------------
    | Deffinir tipo do valor da chave primaria
    |--------------------------------------------------------------------------
    */

    'layout' => [
        'admin'=>env('APP_LAYOUT_ADMIN', 'tall::layouts.admin'),
        'app'=>env('APP_LAYOUT', 'tall::layouts.app')
    ],
    'models' => [

        /*
        |--------------------------------------------------------------------------
        | Model References
        |--------------------------------------------------------------------------
        |
        | Acl precisa saber quais modelos do Eloquent devem ser referenciados durante
        | ações como registro e verificação de permissões, atribuição
        | permissões para funções e usuários e atribuição de funções aos usuários.
        */

        'role' => \App\Models\Role::class,
        'permission' => \App\Models\Permission::class

      ],
      /*
      |--------------------------------------------------------------------------
      | Experimental Cache
      |--------------------------------------------------------------------------
      |
      | O Acl-Action control list vem com uma camada de cache experimental na tentativa de diminuir
      | a carga nos recursos ao verificar e validar as permissões. De
      | padrão está desabilitado, habilite para fornecer feedback.
      */

      'cache' => [

        /**
         * Você pode ativar ou desativar o sistema de cache embutido. Isso é útil
         * ao depurar seu aplicativo. Se o seu aplicativo já tiver seu
         * própria camada de cache, sugerimos desabilitar o cache aqui também.
         */

        'enabled' => false,

        /**
         * Defina por quanto tempo as permissões devem ser armazenadas em cache antes de serem
         * atualizado. Os valores aceitos são em segundos ou como DateInterval
         * objeto. Por padrão, armazenamos em cache por 86400 segundos (também conhecido como 24 horas).
         */

        'length' => 60 * 60 * 24,

        /**
         * Ao usar um driver de cache que suporta tags, marcaremos o acl
         * cache com esta tag. Isso é útil para quebrar apenas o cache
         * responsável por armazenar permissões e nada mais.
         */

        'tag' => 'acl',

      ],
      'components'=>[
            'button' => [
                'class' => \Tall\View\Components\Button::class,
                'alias' => 'button',
            ],
            'input' => [
                'class' => \Tall\View\Components\Input::class,
                'alias' => 'input',
            ],
            'toggle' => [
                'class' => \Tall\View\Components\Toggle::class,
                'alias' => 'toggle',
            ],
            'checkbox' => [
                'class' => \Tall\View\Components\Checkbox::class,
                'alias' => 'checkbox',
            ],
            'icon' => [
                'class' => \Tall\View\Components\Icon::class,
                'alias' => 'icon',
            ],
            'label' => [
                'class' => \Tall\View\Components\Label::class,
                'alias' => 'label',
            ],
            'errors' => [
                'class' => \Tall\View\Components\Errors::class,
                'alias' => 'errors',
            ],
            'error' => [
                'class' => \Tall\View\Components\Error::class,
                'alias' => 'error',
            ],
            'circle-button' => [
                'class' => \Tall\View\Components\CircleButton::class,
                'alias' => 'circle-button',
            ],
            'form-input'=> [
                'class' => \Tall\View\Components\Form\Input::class,
                'alias' => 'form-input',
            ]
        ],
        'multitenancy'=>[           
            /*
            |--------------------------------------------------------------------------
            | Tenant Column
            |--------------------------------------------------------------------------
            |
            | Cada modelo que precisa ser definido por locatário (empresa, usuário, etc.)
            | deve ter uma ou mais colunas que fazem referência ao `id` de um inquilino no inquilino
            | tabela.
            |
            | Por exemplo, se você está fazendo o escopo por empresa, você deve ter um
            | tabela `companies` que armazena todas as suas empresas e suas outras tabelas
            | cada um deve ter uma coluna `company_id` `tenant_id` que faz referência a um `id` no
            | tabela `empresas`.
            |
            */
            'default_tenant_columns' => ['tenant_id'],

            /*
            * Essa chave será usada para vincular o locatário atual no contêiner.
            */
            'current_tenant_container_key' => 'currentTenant',

            'current_tenant_key' => 'tenant_id',

            'current_table' => 'tenants',

            'current_tenant_container_domain' => 'domain',

              /*
            * Esta classe é responsável por determinar qual inquilino deve ser atual
            * para o pedido fornecido.
            *
            * Esta classe deve se estender `Tall\Tenant\TenantFinder\TenantFinder`
            *
            */
            'tenant_finder' => \Tall\Tenant\TenantFinder\DomainTenantFinder::class, 
            /*
            * Esta chave será usada para vincular um prefix de rota ao locatário atual.
            */
            'prefix' => 'admin',
            /*
            * Esses campos são usados ​​pelo comando inquilino:artisan para corresponder a um ou mais inquilinos
            */
            'tenant_artisan_search_fields' => [
                'id',
            ],
             /*
            * Essa classe é o modelo usado para armazenar a configuração em locatários.
            *
            * Deve ser ou estender `Tall\Tenant\Models\Tenant::class`
            */
            'tenant_model' => \App\Models\Tenant::class,

            
            'providers' => [
                'users' => [
                    'model' => [
                        'landlord'=>\Tall\Models\UserLandlord::class,
                        'tenant'=>\Tall\Models\UserTenant::class,
                    ]
                ],
            ],

            /*
            * Se houver um inquilino atual ao despachar um trabalho, o id do inquilino atual
            * será definido automaticamente no trabalho. Quando o trabalho é executado, o conjunto
            * O inquilino no trabalho será atualizado.
            */
            'queues_are_tenant_aware_by_default' => true,

            /*
            * O nome da conexão para acessar o banco de dados do locatário.
            *
            * Defina como `null` para usar a conexão padrão.
            */
            'tenant_database_connection_name' => env('DB_CONNECTION', 'mysql'),

            /*
            * O nome da conexão para acessar o banco de dados do proprietário
            */
            'landlord_database_connection_name' => env('DB_CONNECTION_LANDLORD', 'mysql'),
            

            'current_tenant_container_menus_key'=>[
                'currentMenuSite'=>'menussite',
                'currentMenuAdmin'=>'menusadmin',
            ],
            
            'paths'=>[
                'landlord'=>'/Http/Livewire/Landlord',
                'admin'=>'/Http/Livewire/Admin',
            ],
            /*
            * Os caminho dos componentes administrador e proprietário
            */
            'path' => env('BASE_LIVEWIRE_PATH', '/Http/Livewire/Admin'),
            // OR            
            // 'path' => env('BASE_LIVEWIRE_PATH',[
            //     'landlord'=>'/Http/Livewire/Landlord',
            //     'admin'=>'/Http/Livewire/Admin',
            // ]),
             /*
            * Você pode personalizar parte do comportamento deste pacote usando nossa própria ação personalizada.
            * Sua ação personalizada deve sempre estender a ação padrão.
            */
            'actions' => [
                 'make_tenant_current_action' => \Tall\Tenant\Actions\MakeTenantCurrentAction::class,
                // 'forget_current_tenant_action' => ForgetCurrentTenantAction::class,
                // 'make_queue_tenant_aware_action' => MakeQueueTenantAwareAction::class,
                // 'migrate_tenant' => MigrateTenantAction::class,
            ]

            ],
            

];