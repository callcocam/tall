<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\View\Components\Form;

use Tall\View\Components\Form\Traits\WithOptions;

class Radio extends Field
{
   use WithOptions;

    /**
     * Get the view / contents that represent the component.
     *
     * @return string
     */
    public function view()
    {
        return 'radio';
    }
    
    public function type()
    {
        return "radio";
    }
     
    public function getClass()
    {
        return 'h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500';
    }
}
