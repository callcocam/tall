<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/


namespace Tall\Http\Livewire\Admin\Operacional\Cms\Inputs;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\AbstractDeleteComponent;
use App\Models\Input;

class DeleteComponent extends AbstractDeleteComponent
{
    use AuthorizesRequests;

    public $title = "Excluir";

    public function mount(Input $model)
    {
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties($model);
        $this->verifySecurity();
    }

    public function route(){
         Route::get('/operacional/cms/inputs/{model}/excluir', static::class)->name('admin.cms.inputs.delete');
    }

    public function redirectList()
    {
        $this->confirm--;

        if($this->confirm){

            return;
        }
        return $this->kill('admin.cms.inputs');
    }

    public function getListProperty()
    {
        return 'admin.cms.inputs';
    }

    public function cancel()
    {
        return redirect()->route('admin.cms.inputs');
    }

    public function view()
    {
        return 'tall::admin.operacional.cms.inputs.delete';
    }
}
