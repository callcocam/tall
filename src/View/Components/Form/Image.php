<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\View\Components\Form;

class Image extends Field
{
   
    /**
     * Get the view / contents that represent the component.
     *
     * @return string
     */
    public function view()
    {
        return 'image';
    }

    public function type()
    {
        return "file";
    }

    public function getClass()
    {
        return 'block w-full rounded-none rounded-l-md border-gray-300 pl-10 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm';
    }
}
