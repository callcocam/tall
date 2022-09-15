<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Http\Livewire\Admin\Operacional\Permissoes;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\AbstractDeleteComponent;
use App\Models\Permission;

class DeleteComponent extends AbstractDeleteComponent
{
    use AuthorizesRequests;

    public $title = "Excluir";

    public function mount(Permission $model)
    {
        $this->authorize(Route::currentRouteName());

        $this->data = $model->toArray();
        $this->model = $model;
        $this->verifySecurity();
    }

    public function route(){
         Route::get('/operacional/permissoes/{model}/excluir', static::class)->name('admin.permissions.delete');
    }

    public function redirectList()
    {
        $this->confirm--;

        if($this->confirm){

            return;
        }
        return $this->kill('admin.permissions');
    }

    public function getListProperty()
    {
        return 'admin.permissions';
    }

    public function cancel()
    {
        return redirect()->route('admin.permissions');
    }

    public function view()
    {
        return 'tall::admin.operacional.permissoes.delete';
    }
}
