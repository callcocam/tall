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

class ShowComponent extends FormComponent
{
    use AuthorizesRequests;

    public $title = "Visualizar";

    public function mount(SubMenu $model)
    {
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties($model);
    }

    public function route(){
        Route::get('/operacional/menus/sub-menus/{model}/visualizar', static::class)->name('admin.sub-menus.view');
    }

    public function getListProperty()
    {
        return 'admin.sub-menus';
    }

    public function getEditProperty()
    {
      return 'admin.sub-menus.edit';
    }
    public function getDeleteProperty()
    {
     return 'admin.sub-menus.delete';
    }
    public function view()
    {
        return 'tall::admin.operacional.menus.sub-menus.show';
    }
}
