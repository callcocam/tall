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
        $rules =[
            'name' => 'required',
            'email'=>['required','email',Rule::unique('users', 'email')->ignore($this->model->id)]
        ];

        if(data_get($this->data, 'document')){
            $rules['document'] =[Rule::unique('users', 'document')->ignore($this->model->id)];
        }
        return $rules;
    }

    protected function fields(){

        $fields = [
            'email'=> Input::make('Email')->order(2),
            'document'=> Input::make('Cpf/Cnpj','document')->order(3),
            'profile_photo_path'=> Avatar::make('Foto de perfil','profile_photo_path')->order(4),
            'nationality'=> Input::make('Nacionalidade','nationality')->order(5),
            'vereador_old_id'=> Search::make('vereador_old_id')->modelName('vereador.name')->order(6),
            'profession'=> Input::make('Profição','profession')->order(7),
            'formations'=> Input::make('Formação','formations')->order(8),
            'office'=> Input::make('Gargo','office')->order(9),
            'genre'=> Genre::make('Sexo','genre')->order(10),//Ta preenchido com as informções basica sobre sexo do usuário
            'access'=> Access::make('Permissões de acesso','access')->filters($this->filters)->pluck(\App\Models\Role::query())->order(11),
        ];
        return array_merge( $fields, config('tall.fields.users', []));
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
