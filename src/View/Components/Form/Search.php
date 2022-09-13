<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\View\Components\Form;

use App\View\Components\Form\Traits\WithOptions;


class Search extends Field
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
        $this->setProp('openSearch',false);
        $this->setProp('selectedLabel','');
        $this->setProp('rightIcon','search');
        $this->setProp('iconSize','w-6 h-6');
        $this->setProp('class',"block w-full  rounded-none rounded-l-md border-gray-300 pl-10 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm");
    }

      /**
     * view.
     *
     * @return string
     */
    public function view()
    {
        return "search";
    }



}
