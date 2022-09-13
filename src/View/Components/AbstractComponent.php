<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\View\Components;

use Illuminate\View\Component;

abstract class AbstractComponent extends Component
{
   
    abstract public function view();

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view(sprintf('tall::components.%s', $this->view()));
    }

    
    protected function mergeData(array $data): array
    {
       return $data;
    }

}
