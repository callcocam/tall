<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Http\Livewire\Landlord\Operacional\Menus;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\FormComponent;
use App\Models\Menu;

class CreateComponent extends FormComponent
{
    use AuthorizesRequests;

    public $title = "Cadastrar";

    public function mount(Menu $model)
    {
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties($model);
        data_set($this->data,'name', '');
        data_set($this->data,'user_id', auth()->id());
        data_set($this->data,'status', 'draft');
        data_set($this->data,'created_at', now()->format("Y-m-d"));
        data_set($this->data,'updated_at', now()->format("Y-m-d"));
    }

    public function route(){
        Route::get('/operacional/menus/cadastrar', static::class)->name('admin.menus.create');
    }

    public function rules()
    {
        return [
            'name'=>'required'
        ];
    }

    public function getListProperty()
    {
        return 'admin.menus';
    }
    public function getDeleteProperty()
    {
       return 'admin.menus.delete';
    }

    public function getEditProperty()
    {
       return 'admin.menus.edit';
    }

    public function getCreateProperty()
    {
       return 'admin.menus.create';
    }

    public function view()
    {
        return 'tall::landlord.operacional.menus.create';
    }
}
