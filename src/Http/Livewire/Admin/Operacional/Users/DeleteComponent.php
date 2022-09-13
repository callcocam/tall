<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Http\Livewire\Admin\Operacional\Users;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\AbstractDeleteComponent;
use App\Models\User;

class DeleteComponent extends AbstractDeleteComponent
{
    use AuthorizesRequests;

    public $title = "Excluir";

    public function mount(User $model)
    {
        $this->authorize(Route::currentRouteName());

        $this->data = $model->toArray();
        $this->model = $model;
        $this->verifySecurity();
    }

    public function route(){
         Route::get('/operacional/users/{model}/excluir', static::class)->name('admin.users.delete');
    }

    public function redirectList()
    {
        $this->confirm--;

        if($this->confirm){

            return;
        }
        return $this->kill('admin.users.stores');
    }

    public function getListProperty()
    {
        return 'admin.users.stores';
    }

    public function cancel()
    {
        return redirect()->route('admin.users.stores');
    }

    public function view()
    {
        return 'admin.operacional.users.delete';
    }
}
