<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Http\Livewire\Admin\Operacional\Menus\SubMenus;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\AbstractDeleteComponent;
use App\Models\SubMenu;

class DeleteComponent extends AbstractDeleteComponent
{
    use AuthorizesRequests;

    public $title = "Excluir";

    public function mount(SubMenu $model)
    {
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties($model);
        $this->verifySecurity();
    }

    public function route(){
         Route::get('/operacional/menus/sub-menus/{model}/excluir', static::class)->name('admin.sub-menus.delete');
    }

    public function redirectList()
    {
        $this->confirm--;

        if($this->confirm){

            return;
        }
        return $this->kill('admin.sub-menus');
    }

    public function getListProperty()
    {
        return 'admin.sub-menus';
    }

    public function cancel()
    {
        return redirect()->route('admin.sub-menus');
    }

    public function view()
    {
        return 'admin.operacional.menus.sub-menus.delete';
    }
}
