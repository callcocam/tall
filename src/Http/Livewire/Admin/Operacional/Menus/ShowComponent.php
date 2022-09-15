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

class ShowComponent extends FormComponent
{
    use AuthorizesRequests;

    public $title = "Visualizar";
    public $sortable = true;


    protected $queryString = [
        'filters' => ['except' => []]
    ];

    public function mount(Menu $model)
    {
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties($model);
    }

    public function route(){
        Route::get('/operacional/menus/{model}/visualizar', static::class)->name('admin.menus.view');
    }

    public function getListProperty()
    {
        return 'admin.menus';
    }

    public function getEditProperty()
    {
      return 'admin.menus.edit';
    }
    public function getDeleteProperty()
    {
     return 'admin.menus.delete';
    }
    public function view()
    {
        return 'tall::admin.operacional.menus.show';
    }

}
