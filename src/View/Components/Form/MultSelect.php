<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\View\Components\Form;

use Tall\View\Components\Form\Traits\WithOptions;

class MultSelect extends Field
{
    use WithOptions;
   
    protected $asyncData = [];
      /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name=null)
    {
        $this->init($label, $name);
        $this->setProp('multiple',true);
        $this->setProp('openSearch',false);
        $this->setProp('selectedLabel','');
        $this->setProp('rightIcon','search');
        $this->setProp('iconSize','w-6 h-6');
    }

      /**
     * view.
     *
     * @return string
     */
    public function view()
    {
        return "mult-select-01";
    }

}
