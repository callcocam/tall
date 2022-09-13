<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\View\Components\Form;

class Status extends Radio
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name=null)
    {
        $this->init($label, $name);
        $this->options(['Desabilitado'=>"draft", 'Abilitado'=>'published']);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return string
     */
    public function view()
    {
        return 'status';
    }

}
