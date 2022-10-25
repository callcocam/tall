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
    public $search="";
    
    protected function models(){
        
    }

    protected function data(){
        return [
            'models'=>null
        ];
    }
  
    protected function layout()
    {
        if(config('tall.use_layout_default', false)){
            return config('livewire.layout');
        }
        return config('tall.layout.app',"tall::layouts.app");
    }

    public function render()
    {
        return view(sprintf("%s-component", $this->view()))
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
    
    public function geGroupUpdatedOrder()
    {
       return [];
    }
    
    public function setGroupUpdatedOrder($data)
    {
        $orders = explode("|", $data);
        $orders = array_filter($orders);
        return $orders;
    }
}
