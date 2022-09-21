<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Http\Livewire\Landlord\Operacional\Tenants;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\AbstractDeleteComponent;
use App\Models\CurrentTenant;

class DeleteComponent extends AbstractDeleteComponent
{
    use AuthorizesRequests;

    public $title = "Excluir";

    public function mount(CurrentTenant $model)
    {
        $this->authorize(Route::currentRouteName());

        $this->data = $model->toArray();
        $this->model = $model;
        $this->verifySecurity();
    }

    public function route(){
         Route::get('/operacional/tenants/{model}/excluir', static::class)->name('admin.tenants.delete');
    }

    public function redirectList()
    {
        $this->confirm--;

        if($this->confirm){

            return;
        }
        return $this->kill('admin.tenants');
    }

    public function getListProperty()
    {
        return 'admin.tenants';
    }

    public function cancel()
    {
        return redirect()->route('admin.tenants');
    }

    public function view()
    {
        return 'tall::landlord.operacional.tenants.delete';
    }
}
