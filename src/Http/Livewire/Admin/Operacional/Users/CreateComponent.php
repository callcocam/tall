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
use App\Models\User;
use Tall\View\Components\Form\{ Input };

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
        data_set($this->data,'username', uniqid());
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
        return [
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
        ];
    }

    protected function fields(){

        return [
            'email'=> Input::make('Email')
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
}
