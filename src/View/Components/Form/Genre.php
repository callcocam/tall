<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\View\Components\Form;

class Genre extends Radio
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name=null)
    {
        $this->init($label, $name);
        $this->options(['male'=>"Masculino", 'female'=>'Femenino','other'=>'Outro']);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return string
     */
    public function view()
    {
        return "radio";
    }
  
}
