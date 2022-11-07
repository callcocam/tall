<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Http\Livewire\Landlord\Operacional\Roles;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\FormComponent;
use App\Models\Role;
use Tall\View\Components\Form\{Access, Editor};


class EditComponent extends FormComponent
{
    use AuthorizesRequests;

    public $title = "Editar";

    public function mount(Role $model)
    {
         $this->authorize(Route::currentRouteName());
         $this->setFormProperties($model);
    }

    public function route(){
        Route::get('/operacional/roles/{model}/editar', static::class)->name('admin.roles.edit');
    }

    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }

    public function save()
    {
        if(parent::save()){
             if($permissions = data_get($this->data, 'permissions')){
                 $this->model->syncPermissions($permissions);
             }
            return true;
        }
        return false;
    }

    protected function fields(){

        return [
            'permissions'=> Access::make('Permissions')->order(4)
            ->filters($this->filters)->pluck(\App\Models\Permission::query()),
            // 'description'=> Editor::make('Description')->order(5)
            //   ->array(
            //     [
            //         'modules' => [
            //           'toolbar'=> [
            //             ['bold', 'italic', 'underline', 'strike'], // toggled buttons
            //             ['blockquote', 'code-block'],
            //             [[ 'header'=> 1 ], [ 'header'=> 2 ]], // custom button values
            //             [[ 'list'=> 'ordered' ], [ 'list'=> 'bullet' ]],
            //             [[ 'script'=> 'sub' ], [ 'script'=> 'super' ]], // superscript/subscript
            //             [[ 'indent'=> '-1' ], [ 'indent'=> '+1' ]], // outdent/indent
            //             [[ 'direction'=> 'rtl' ]], // text direction
            //             [[ 'size'=> ['small', false, 'large', 'huge'] ]], // custom dropdown
            //             [[ 'header'=> [1, 2, 3, 4, 5, 6, false] ]],
            //             [[ 'color'=> [] ], [ 'background'=> [] ]], // dropdown with defaults from theme
            //             [[ 'font'=> [] ]],
            //             [[ 'align'=> [] ]],
            //             ['clean'], // remove formatting button
            //           ],
            //         ],
            //         'placeholder'=> 'Enter your content...',
            //         'theme'=> 'snow',
            //     ]
            // )
        ];
    }

    public function getListProperty()
    {
        return 'admin.roles';
    }

    public function view()
    {
        return 'tall::landlord.operacional.roles.edit';
    }
}
