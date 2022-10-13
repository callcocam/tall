<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\View\Components\Form;

use Tall\View\Components\Form\Traits\WithOptions;

class Select extends Field
{
    use WithOptions;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name=null)
    {
        $this->init($label, $name);
        $this->setProp('openSearch',false);
        $this->setProp('selectedLabel','');
    }

    public function cover($cover="cover")
    {        
        $this->setProp('cover',$cover);
        $this->setProp('type',1);

        return $this;
    }

    
    public function online()
    {        
        $this->setProp('type',2);
        
        return $this;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return string
     */
    public function view()
    {
        return 'select';
    }
}
