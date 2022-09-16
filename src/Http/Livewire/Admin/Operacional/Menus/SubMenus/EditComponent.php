<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Http\Livewire\Admin\Operacional\Menus\SubMenus;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\FormComponent;
use App\Models\SubMenu;
use Tall\View\Components\Form\{ Input};

class EditComponent extends FormComponent
{
    use AuthorizesRequests;

    public $title = "Editar";

    public function mount(SubMenu $model)
    {
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties($model);
    }

    public function route(){
        Route::get('/operacional/menus/sub-menus/{model}/editar', static::class)->name('admin.sub-menus.edit');
    }

    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }

    protected function fields(){

        return [
            'slug'=> Input::make('Slug','slug'),
            'alias'=> Input::make('Alias','alias'),
        ];
    }
    public function getListProperty()
    {
        return 'admin.sub-menus';
    }

    public function view()
    {
        return 'tall::admin.operacional.menus.sub-menus.edit';
    }
}
