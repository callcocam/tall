<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Http\Livewire\Admin\Operacional\Users;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\FormComponent;
use Tall\Models\UserTenant as User;
use Tall\View\Components\Form\{Db, Input };

class CreateComponent extends FormComponent
{
    use AuthorizesRequests;

    public $title = "Cadastrar";

    public function mount(User $model)
    {
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties($model);
        data_set($this->data,'name', '');
        data_set($this->data,'email', '');
        data_set($this->data,'username', 'w');
        data_set($this->data,'content', '');
        data_set($this->data,'password', date("YmdHis"));
        data_set($this->data,'user_id', auth()->id());
        data_set($this->data,'status', 'draft');
        data_set($this->data,'created_at', now()->format("Y-m-d"));
        data_set($this->data,'updated_at', now()->format("Y-m-d"));
    }

    public function route(){
        Route::get('/operacional/users/cadastrar', static::class)->name('admin.users.create');
    }

    public function rules()
    {
        $rules =[
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
        ];

        if(data_get($this->data, 'document')){
            $rules['document'] ='required|unique:users,document';
        }
        return $rules;
    }

    protected function fields(){

        return [
            'email'=> Input::make('Email')->order(4 ),
            'content'=> Db::make('content')->db('content')->order(6 ),
            'username'=> Db::make('username')->db('username')
        ];
    }

    public function getListProperty()
    {
        return 'admin.users';
    }

    public function getDeleteProperty()
    {
       return 'admin.users.delete';
    }

    public function getEditProperty()
    {
       return 'admin.users.edit';
    }

    public function getCreateProperty()
    {
       return 'admin.users.create';
    }
    public function view()
    {
        return 'tall::admin.operacional.users.create';
    }

    
    public function getIgnoresProperty()
    {
        return [
          'vereador','profile_photo_url','two_factor_confirmed_at','id','company_id','slug','email_verified_at','current_team_id','deleted_at','assets'
        ];
    }
}
