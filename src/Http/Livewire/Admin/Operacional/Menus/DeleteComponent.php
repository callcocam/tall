<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Http\Livewire\Admin\Operacional\Menus;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\AbstractDeleteComponent;
use App\Models\Menu;

class DeleteComponent extends AbstractDeleteComponent
{
    use AuthorizesRequests;

    public $title = "Excluir";

    public function mount(Menu $model)
    {
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties($model);
        $this->verifySecurity();
    }

    public function route(){
         Route::get('/operacional/menus/{model}/excluir', static::class)->name('admin.menus.delete');
    }

    public function redirectList()
    {
        $this->confirm--;

        if($this->confirm){

            return;
        }
        return $this->kill('admin.menus');
    }

    public function getListProperty()
    {
        return 'admin.menus';
    }

    public function cancel()
    {
        return redirect()->route('admin.menus');
    }

    public function view()
    {
        return 'admin.operacional.menus.delete';
    }
}
