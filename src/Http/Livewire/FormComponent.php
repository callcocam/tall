<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Http\Livewire;

use Livewire\Component;
use Tall\Http\Livewire\Traits\FollowsRules;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;

abstract class FormComponent extends AbstractComponent
{

    use FollowsRules, WithFileUploads;

    public $model;
    public $data = [];
    public $filters = [];
    
    public function layout()
    {
        return "tall::layouts.admin";
    }

    protected function data(){
        return [
            'data'=>$this->data
        ];
    }

    protected function fields(){
        return [];
    }

      /**
     * @param null $model
     */
    public function setFormProperties($model = null)
    {
        //$this->user = $this->user();
        $this->model = $model;
        if ($model) {
            $this->data = $model->toArray();
        }
        // dd( $this->data);
    }


    public function uploadPhoto()
    {
        if($this->data){
            foreach($this->data as $name => $file){
                if($file instanceof UploadedFile){
                    $this->validate([
                        "data.{$name}" => 'required|max:10240', // 1MB Max
                    ]);
                    $this->data[$name] = $file->store($name);
                }
            }
        }
        return true;

    }

    public function getTypesProperty()
    {
        
        $defaults = [
            'name'=> \Tall\View\Components\Form\Input::make('name'),
            'status'=> \Tall\View\Components\Form\Status::make('Status'),
            'assets'=> \Tall\View\Components\Form\Input::make('assets'),
            'date_birth'=> \Tall\View\Components\Form\DateTime::make('Data de Nascimento','date_birth'),
            'created_at'=> \Tall\View\Components\Form\DateTime::make('created_at'),
            'updated_at'=> \Tall\View\Components\Form\DateTime::make('updated_at'),
            'description'=> \Tall\View\Components\Form\Textarea::make('description'),
        ];
        
        return array_merge($defaults, $this->fields());
    }

    public function getIgnoresProperty()
    {
        return [
          'vereador','password','profile_photo_url','two_factor_confirmed_at','username','id','company_id','slug','email_verified_at','current_team_id','deleted_at','assets'
        ];
    }

    public function getFieldProperty()
    {
        return 'name';
    }

    public function submit()
    {
        $this->validate();
        $this->uploadPhoto();
        return $this->save();
    }

    protected function save(){
  
        if ($this->model->exists) {
            try {
                if($this->model->update($this->data)){
                    $this->success( __('OPSS!!'), __("Cadastro atualizado com sucesso!!"));
                    return true;
                }
                return false;
            } catch (\PDOException $PDOException) {
                $this->error('Error !!!', __($PDOException->getMessage()));
                return false;
            }
        } else {
            try {
                $this->model = $this->model->create($this->data);
                if ($this->model->exists) {
                    $this->success( __('OPSS!!'), __("Cadastro atualizado com sucesso!!"));
                    if(method_exists($this, 'edit')){
                        if(\Route::has($this->edit)){
                            return redirect()->route($this->edit,['model'=>$this->model]);
                        }
                        elseif(\Route::has($this->list)){
                            return redirect()->route($this->list);
                        }
                    }
                    else{
                        $this->setFormProperties($this->model);
                        return true;
                    }
                }
                return false;
            } catch (\PDOException $PDOException) {
                $this->error('Error !!!', __($PDOException->getMessage()));
                return false;
            }
        }

    }

    public function view()
    {
        return 'tall::form';
    }
}
