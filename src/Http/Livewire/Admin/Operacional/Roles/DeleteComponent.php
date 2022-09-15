<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Http\Livewire\Admin\Operacional\Roles;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\AbstractDeleteComponent;
use App\Models\Role;

class DeleteComponent extends AbstractDeleteComponent
{
    use AuthorizesRequests;

    public $title = "Excluir";

    public function mount(Role $model)
    {
        $this->authorize(Route::currentRouteName());

        $this->data = $model->toArray();
        $this->model = $model;
        $this->verifySecurity();
    }

    public function route(){
         Route::get('/operacional/roles/{model}/excluir', static::class)->name('admin.roles.delete');
    }

    public function redirectList()
    {
        $this->confirm--;

        if($this->confirm){

            return;
        }
        return $this->kill('admin.roles');
    }

    public function getListProperty()
    {
        return 'admin.roles';
    }

    public function cancel()
    {
        return redirect()->route('admin.roles');
    }

    public function view()
    {
        return 'tall::admin.operacional.roles.delete';
    }
}
