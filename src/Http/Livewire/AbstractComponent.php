<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Http\Livewire;

use Livewire\Component;

abstract class AbstractComponent extends Component
{


    protected function models(){
        
    }

    protected function data(){
        return [
            'models'=>null
        ];
    }
  
    protected function layout()
    {
        return "layouts.app";
    }

    public function render()
    {
        return view(sprintf("tall::%s-component", $this->view()))
        ->with($this->data())        
        ->layout($this->layout(),['querysLogs'=>\DB::getQueryLog()]);
    }

    public function success($title, $message)
    {
        $this->dispatchBrowserEvent('notify', ['title' => $title, 'message'=>$message, 'type'=>'success', 'time'=>3000]);
        //$this->emitTo('includes.global.notifications','notify', $title, $message);
    }

    public function error($title, $message)
    {
        $this->dispatchBrowserEvent('notify', ['title' => $title, 'message'=>$message, 'type'=>'danger', 'time'=>3000]);
        // $this->emitTo('includes.global.notifications','notify', $title, $message, 'danger');
    }

    public function danger($title, $message)
    {
        $this->dispatchBrowserEvent('notify', ['title' => $title, 'message'=>$message, 'type'=>'danger', 'time'=>3000]);
        // $this->emitTo('includes.global.notifications','notify', $title, $message, 'danger');
    }
    
    public function warning($title, $message)
    {
        $this->dispatchBrowserEvent('notify', ['title' => $title, 'message'=>$message, 'type'=>'warning', 'time'=>3000]);
        // $this->emitTo('includes.global.notifications','notify', $title, $message, 'warning');
    }
    
    public function info($title, $message)
    {
        $this->dispatchBrowserEvent('notify', ['title' => $title, 'message'=>$message, 'type'=>'info', 'time'=>3000]);
        // $this->emitTo('includes.global.notifications','notify', $title, $message, 'info');
    }
    
}
