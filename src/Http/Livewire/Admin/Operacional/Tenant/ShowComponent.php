<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Http\Livewire\Admin\Operacional\Tenant;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\FormComponent;
use App\Models\Tenant;
use Tall\View\Components\Form\{Input};

class ShowComponent extends FormComponent
{
    use AuthorizesRequests;

    public $title = "Profile";

    public function mount()
    {
         $this->authorize(Route::currentRouteName());       
         $this->setFormProperties(app('currentTenant'));
    }

    public function route(){
        Route::get('/operacional/tenant', static::class)->name('admin.tenant.view');
    }


    public function rules()
    {
        return [
            'name' => 'required',
            'email'=>'required|email|unique:users,email',
        ];
    }
    
    protected function fields(){

        return [
            'domain'=> Input::make('Dominio','domain'),
            'email'=> Input::make('E-Mail','email'),
            'prefix'=> Input::make('Prefix','prefix'),
            'database'=> Input::make('Database','database'),
            'middleware'=> Input::make('Middleware','middleware'),
            'provider'=> Input::make('Provider','provider'),
        ];
    }

    public function getListProperty()
    {
        return 'dashboard';
    }
    public function view()
    {
        return 'admin.operacional.tenant.show';
    }
}
