<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Http\Livewire\Admin\Operacional\Tenants;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\FormComponent;
use App\Models\CurrentTenant;
use Tall\View\Components\Form\{Input};


class EditComponent extends FormComponent
{
    use AuthorizesRequests;

    public $title = "Editar";

    public function mount(CurrentTenant $model)
    {
         $this->authorize(Route::currentRouteName());
         $this->setFormProperties($model);
    }

    public function route(){
        Route::get('/operacional/tenants/{model}/editar', static::class)->name('admin.tenants.edit');
    }

    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }

    // public function save()
    // {
    //     if(parent::save()){
    //          if($permissions = data_get($this->data, 'permissions')){
    //              $this->model->syncPermissions($permissions);
    //          }
    //         return true;
    //     }
    //     return false;
    // }

  
    protected function fields(){

        return [
            'domain'=> Input::make('Dominio','domain'),
            'email'=> Input::make('E-Mail','email'),
            'prefix'=> Input::make('Prefix','prefix')->span(4),
            'database'=> Input::make('Database','database'),
            'middleware'=> Input::make('Middleware','middleware'),
            'provider'=> Input::make('Provider','provider'),
        ];
    }

    public function getListProperty()
    {
        return 'admin.tenants';
    }

    public function view()
    {
        return 'tall::admin.operacional.tenants.edit';
    }
}
