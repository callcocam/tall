<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Http\Livewire\Traits;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

trait DeleteTrait
{
    
    public $password;
    public $confirm = 0;
    public $security = 0;
    public $valid = 0;

    protected function verifySecurity(){
        $date = now();
        if(auth()->user()->security){
            if($date->lessThan(auth()->user()->security)){
                $this->security = 1;
            }
            else{
                if($user = \App\Models\User::find(auth()->user()->id)){
                    $user->update([
                        'security'=>null
                     ]);
                 }
            }
        }
    }
    
    public function remove()
    {
        if(auth()->user()->security){
            $this->confirm = 5;
        }
        else{
            if(empty($this->password)){
                $this->addError('password', 'Pro favor digite sua senha');
                return;
            }
            $this->resetErrorBag('password');
            if(Hash::check($this->password, auth()->user()->password)){
                $this->confirm = 5;         
            }elseif(Hash::check( sprintf("%s-%s", $this->password, auth()->user()->email), auth()->user()->password)){
                $this->confirm = 5;                
             }else{
                 $this->addError('password', __('A senha fornecida não corresponde à sua senha atual.'));
             }
        }      
    }

    public function updatedPassword($value)
    {
        $this->resetErrorBag('security');
        if(!auth()->user()->security){
            if(Hash::check($value, auth()->user()->password)){
                $this->resetErrorBag('password');
                $this->valid = 1;                  
            }elseif(Hash::check( sprintf("%s-%s", $value, auth()->user()->email), auth()->user()->password)){
                $this->resetErrorBag('password');
                $this->valid = 1;
            }
            else{
                $this->valid = 0;
                $this->addError('password', __('A senha fornecida não corresponde à sua senha atual.'));
            }
        }
    }

    public function updatedSecurity($value)
    {
        if(!auth()->user()->security){
            if(!Hash::check($this->password, auth()->user()->password)){
                $this->security = 0;
                $this->addError('security', __('A senha fornecida não corresponde à sua senha atual.'));
            }elseif(!Hash::check( sprintf("%s-%s", $this->password, auth()->user()->email), auth()->user()->password)){
                $this->security = 0;
                $this->addError('security', __('A senha fornecida não corresponde à sua senha atual.'));
            }
        }
    }
   
    public function trash()
    {
        $this->model->delete();
        return redirect()->route($this->list);
    }
    public function kill($route=null, $params=[])
    {
        if($this->model->delete()){  
            $this->confirm = 0;
            if($user = \App\Models\User::find(auth()->user()->id)){
                $user->update([
                    'security'=>now()->addDays(10)->format("Y-m-d H:i:s")
                 ]);
             }
            if(Route::has($route)){
                return redirect()->route($route, $params);
            }
            else{
                return redirect()->back();
            }
        }
    }

    public function trashConfirm($callback=null)
    {
        if($this->model->delete()){
            $this->success( __('OPSS!!'), __("Cadastro excluido com sucesso!!"));  
            if($callback){
                $callback($this->model);
            }
            $this->emit('loadMenusAdd');  
            return true;
        }
        $this->error( __('OPSS!!'), __("Não foi possivel excluir o cadastro!!")); 
        return false;
       
    }
    
    public function showModalToggle()
    {
        $this->showModal = !$this->showModal;
    }
    public function getRelationsProperty()
    {
        # code...
    }
}
