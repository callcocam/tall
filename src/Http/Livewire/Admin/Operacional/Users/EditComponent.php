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
use Tall\View\Components\Form\{Access, Input, Genre, Avatar, Search};

class EditComponent extends FormComponent
{
    use AuthorizesRequests;

    public $title = "Editar";

    public function mount(User $model)
    {
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties($model);
    }

    public function route(){
        Route::get('/operacional/users/{model}/editar', static::class)->name('admin.users.edit');
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
            'access'=> Access::make('Access')->filters($this->filters)->pluck(\App\Models\Role::query()),
            'profile_photo_path'=> Avatar::make('profile_photo_path'),
            'document'=> Input::make('Cpf/Cnpj','document'),
            'email'=> Input::make('Email'),
            'nationality'=> Input::make('Nationality'),
            'vereador_old_id'=> Search::make('vereador_old_id')->modelName('vereador.name'),
            'profession'=> Input::make('Profession'),
            'formations'=> Input::make('Formations'),
            'office'=> Input::make('Office'),
            'genre'=> Genre::make('Genre'),//Ta preenchido com as informções basica sobre sexo do usuário
        ];
    }

    public function getListProperty()
    {
        return 'admin.users';
    }

    public function view()
    {
        return 'tall::admin.operacional.users.edit';
    }
}
