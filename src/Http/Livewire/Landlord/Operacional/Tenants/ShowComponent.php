<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Http\Livewire\Landlord\Operacional\Tenants;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\FormComponent;
use App\Models\CurrentTenant;

class ShowComponent extends FormComponent
{
    use AuthorizesRequests;

    public $title = "Visualizar";
    public $filters = [];

    public $step;

    protected $queryString = [
        'filters' => ['except' => []]
    ];


    public function mount(CurrentTenant $model)
    {
         $this->authorize(Route::currentRouteName());

         $this->setFormProperties($model);

         data_set($this->data, 'tenant', $model->copy_tenants()->firstOrCreate([
            config('tall.multitenancy.current_tenant_key','tenant_id')=>$model->id
         ]));
         $this->step = data_get($this->data, 'tenant.step', 0);

    }

    public function route(){
        Route::get('/operacional/tenants/{model}/visualizar', static::class)->name('admin.tenants.view');
    }

    public function updatedData($value)
    {
        
    }
    
    public function updatedDataTenantStepAccess($value)
    {
        dd($value);
    }
    
    public function updatedDataTenantStepMenus($value)
    {
        dd($value);
    }

    public function nextStep()
    {
        $this->step++;
        data_set($this->data, 'tenant.step', $this->step);
        $this->model->copy_tenants->forceFill(data_get($this->data, 'tenant'))->save();
    }

    public function prevStep()
    {
        $this->step--;
        data_set($this->data, 'tenant.step', $this->step);
        $this->model->copy_tenants->forceFill(data_get($this->data, 'tenant'))->save();
    }
    
    public function getTenantsProperty()
    {
        return $this->model->allTenants()->get();
    }
    
    public function getRolesProperty()
    {
        return \App\Models\Role::query()->where(config('tall.multitenancy.current_tenant_key','tenant_id'),data_get($this->data,'tenant.stepTenant'))->get();
    }
    
    public function getMenusProperty()
    {
        return \App\Models\Menu::query()->where(config('tall.multitenancy.current_tenant_key','tenant_id'),data_get($this->data,'tenant.stepTenant'))->get();
    }

    public function getCurrentStepProperty()
    {
        return data_get($this->data, 'copy_tenants');
    }

    public function getListProperty()
    {
        return 'admin.tenants';
    }

    public function getEditProperty()
    {
      return 'admin.tenants.edit';
    }
    public function getDeleteProperty()
    {
     return 'admin.tenants.delete';
    }
    public function view()
    {
        return 'tall::landlord.operacional.tenants.show';
    }
}
