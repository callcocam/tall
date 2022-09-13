<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Http\Livewire\Admin\Operacional\Menus;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\FormComponent;
use App\Models\Menu;

class EditComponent extends FormComponent
{
    use AuthorizesRequests;

    public $title = "Editar";

    public function mount(Menu $model)
    {
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties($model);
    }

    public function route(){
        Route::get('/operacional/menus/{model}/editar', static::class)->name('admin.menus.edit');
    }

    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }

    public function getListProperty()
    {
        return 'admin.menus';
    }

    public function view()
    {
        return 'admin.operacional.menus.edit';
    }
}
