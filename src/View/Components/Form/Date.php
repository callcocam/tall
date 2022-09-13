<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\View\Components\Form;

use Illuminate\View\Component;

class Date extends  Field
{
   
    /**
     * Get the view / contents that represent the component.
     *
     * @return string
     */
    public function view()
    {
        return "date";
    }

    public function type()
    {
        return "date";
    }
}
