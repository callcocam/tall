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

class CreateComponent extends FormComponent
{
    use AuthorizesRequests;

    public $title = "Cadastrar";

    public function mount(SubMenu $model)
    {
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties($model);
        data_set($this->data,'name', '');
        data_set($this->data,'user_id', auth()->id());
        data_set($this->data,'status', 'draft');
        data_set($this->data,'created_at', now()->format("Y-m-d H:i:s"));
        data_set($this->data,'updated_at', now()->format("Y-m-d H:i:s"));
    }

    public function route(){
        Route::get('/operacional/menus/sub-menus/cadastrar', static::class)->name('admin.sub-menus.create');
    }

    public function rules()
    {
        return [
            'name'=>'required'
        ];
    }

    public function getListProperty()
    {
        return 'admin.sub-menus';
    }
    public function getDeleteProperty()
    {
       return 'admin.sub-menus.delete';
    }

    public function getEditProperty()
    {
       return 'admin.sub-menus.edit';
    }

    public function getCreateProperty()
    {
       return 'admin.sub-menus.create';
    }
    public function view()
    {
        return 'admin.operacional.menus.sub-menus.create';
    }
}
