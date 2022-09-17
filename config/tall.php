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
    | Deffinir tipo do valor da chave primaria
    |--------------------------------------------------------------------------
    */
    'keyType'=>'string',//int, string
    /*
    |--------------------------------------------------------------------------
    | Tenant Column
    |--------------------------------------------------------------------------
    |
    | Every model that needs to be scoped by tenant (company, user, etc.)
    | should have one or more columns that reference the `id` of a tenant in the tenant
    | table.
    |
    | For example, if you are scoping by company, you should have a
    | `companies` table that stores all your companies, and your other tables
    | should each have a `company_id` `tenant_id` column that references an `id` on the
    | `companies` table.
    |
    */
    'default_tenant_columns' => ['tenant_id'],

    /*
    * This key will be used to bind the current tenant in the container.
    */
    'current_tenant_container_key' => 'currentTenant',

    'current_tenant_key' => 'tenant_id',

    'layout' => [
        'admin'=>env('APP_LAYOUT_ADMIN', 'admin'),
        'app'=>env('APP_LAYOUT', 'app')
    ],
    'models' => [

        /*
        |--------------------------------------------------------------------------
        | Model References
        |--------------------------------------------------------------------------
        |
        | Shinobi precisa saber quais modelos do Eloquent devem ser referenciados durante
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
      ]
];