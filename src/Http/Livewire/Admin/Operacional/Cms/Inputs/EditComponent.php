<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/


namespace Tall\Http\Livewire\Admin\Operacional\Cms\Inputs;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\FormComponent;
use App\Models\Input;
use Tall\View\Components\Form\Input as InputField;
use Tall\View\Components\Form\ArrayField;
use Tall\View\Components\Form\Radio;
use Tall\View\Components\Form\Input as ComponentsInput;

class EditComponent extends FormComponent
{
    use AuthorizesRequests;

    public $title = "Editar";
    protected $listeners = ['loadModels'=>'$refresh'];

    public function mount(Input $model)
    {
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties($model);
        // dd($model->toArray());
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

  
    protected function fields(){

        return [
            'type'=> Radio::make('Tipo','type')->options([
                'text'=>'Text',
                'date'=>'Date',
                'date-local'=>'Date Time',
                'range'=>'Range',
                'number'=>'Number',
                'radio'=>'Radio',
                'checkbox'=>'Checkbox',
                'select'=>'Select',
                'db'=>'DB',
                'textarea'=>'Textarea',
            ])->order(3),
            'template'=> Radio::make('Template','template')->options([
                'input'=>'Text',
                'date'=>'Date',
                'date-local'=>'Date Time',
                'range'=>'Range',
                'number'=>'Number',
                'radio'=>'Radio',
                'checkbox'=>'Checkbox',
                'select'=>'Select',
                'textarea'=>'Textarea',
            ])->order(3),
            // 'template'=> ComponentsInput::make('Template','template')->order(3),
            'attributes'=> ArrayField::make('Atributos','attributes')
            ->array([
                'name'=> InputField::make('Name','name')->span('3'),
                // 'type'=> InputField::make('type','type')->span('2'),
                'description'=> InputField::make('Description','description')->span('3'),
            ])->array_view('admin.operacional.cms.inputs.attributes')
            ->order(4),
            'options'=> ArrayField::make('Options','options')
            ->array([
                'name'=> InputField::make('Name','name')->span('2'),
                'description'=> InputField::make('Description','description')->span('2'),
            ])->array_view('admin.operacional.cms.inputs.options')
            ->order(5)->hiddenIf(in_array(data_get($this->data, 'type'), [
                'db',
                'radio',
                'checkbok',
                'select'
            ]))
        ];
    }
    public function getListProperty()
    {
        return 'admin.cms.inputs';
    }

    public function view()
    {
        return 'tall::admin.operacional.cms.inputs.edit';
    }
}
