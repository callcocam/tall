<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Http\Livewire\Admin\Operacional\Cms;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\TableComponent;
use App\Models\Input;

class ListComponent extends TableComponent
{
    use AuthorizesRequests;

    public function mount()
    {
        $this->authorize(Route::currentRouteName());
    }

    public function route(){
        Route::get('/operacional/cms/inputs', static::class)->name('admin.cms.inputs');
    }

    public function query()
    {
        $builder = Input::query();
        // if($role = data_get($this->filters, 'menu')){
        //     $builder->whereHas('menu', function ($builder) use ($role) {
        //         $builder->where('id', $role);
        //     });
        // }
        // if($parent = data_get($this->filters, 'parent')){
        //     $builder->where('sub_menu_id', $parent);
        // }
        return $builder;
    }

    public function getListProperty()
    {
        return 'admin.cms.inputs';
    }

    public function getCreateProperty()
    {
        return 'admin.cms.inputs.create';
    }

    public function getShowProperty()
    {
       return 'admin.cms.inputs.view';
    }
    public function getEditProperty()
    {
       return 'admin.cms.inputs.edit';
    }
    public function getDeleteProperty()
    {
       return 'admin.cms.inputs.delete';
    }
    public function view()
    {
        return 'tall::admin.operacional.cms.inputs.list';
    }
}
