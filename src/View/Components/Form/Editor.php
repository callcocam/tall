<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\View\Components\Form;

use Tall\View\Components\Form\Traits\WithOptions;

class Editor extends  Field
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
        $this->setProp('row',"4");
        $this->array([
            'modules' => [
                'toolbar' => [
                    ['bold', 'italic', 'underline'],
                    [
                    ['list' =>'ordered'],
                    ['header' =>1],
                    ['background' => []],
                    ],
                ],
            ],
            'placeholder' => 'Enter your content...',
            'theme' => 'snow',
        ]);
        $this->setProp('class',"block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm");
    }

    
    /**
     * Get the view / contents that represent the component.
     *
     * @return string
     */
    public function view()
    {
        return "editor";
    }
}
