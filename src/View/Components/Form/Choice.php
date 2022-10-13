<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\View\Components\Form;

use Tall\View\Components\Form\Traits\WithOptions;

class Choice extends Field
{
    use WithOptions;
    /**
     * Get the view / contents that represent the component.
     *
     * @return string
     */
    public function view()
    {
        return 'choice';
    }

}
