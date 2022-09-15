<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Http\Livewire\Admin\Operacional\Permissoes;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\FormComponent;
use App\Models\Permission;

class EditComponent extends FormComponent
{
    use AuthorizesRequests;

    public $title = "Editar";

    public function mount(Permission $model)
    {
         $this->authorize(Route::currentRouteName());
         $this->setFormProperties($model);
    }

    public function route(){
        Route::get('/operacional/permissoes/{model}/editar', static::class)->name('admin.permissions.edit');
    }

    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }

    // public function submit()
    // {
    //     $this->validate();
    //     $this->model->update($this->data);

    //     // To attain knowledge, add things every day; To attain wisdom, subtract things every day.
    // }

    public function getListProperty()
    {
        return 'admin.permissions';
    }

    public function view()
    {
        return 'tall::admin.operacional.permissoes.edit';
    }
}
