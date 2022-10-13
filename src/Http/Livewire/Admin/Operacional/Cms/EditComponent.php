<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/


namespace Tall\Http\Livewire\Admin\Operacional\Cms;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\FormComponent;
use App\Models\Input;
use Tall\View\Components\Form\Input as InputField;

class EditComponent extends FormComponent
{
    use AuthorizesRequests;

    public $title = "Editar";

    public function mount(Input $model)
    {
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties($model);
    }

    public function route(){
        Route::get('/operacional/cms/inputs/{model}/editar', static::class)->name('admin.cms.inputs.edit');
    }

    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }

    // protected function fields(){

    //     return [
    //         'slug'=> InputField::make('Slug','slug'),
    //         'alias'=> Input::make('Alias','alias'),
    //     ];
    // }
    public function getListProperty()
    {
        return 'admin.cms.inputs';
    }

    public function view()
    {
        return 'tall::admin.operacional.cms.inputs.edit';
    }
}
