<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\View\Components\Form;

use Illuminate\View\Component;
use Tall\View\Components\Form\Traits\WithOptions;

class ArrayField extends  Field
{
    use WithOptions;
   
    /**
     * Get the view / contents that represent the component.
     *
     * @return string
     */
    public function view()
    {
        return "array-field";
    }

    public function type()
    {
        return "array-field";
    }

    
    public function array_view($array_view)
    {
        $this->setProp('array_view', $array_view);

        return $this;
    }
}
