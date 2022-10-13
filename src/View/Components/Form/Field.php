<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\View\Components\Form;

use Illuminate\View\Component;

abstract class Field extends Component
{

    protected $props = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name=null)
    {
        $this->init($label, $name);
    }

    public function init($label, $name=null)
    {
        $this->setProp('id', uniqid());
        $this->setProp('type', $this->type());
        if($label){
            if(empty($name)){
                $name = \Str::slug($label, '_');
            }
            $this->setProp('key', sprintf("data.%s", $name));
            $this->setProp('name', $name);
            $this->setProp('label', $label);
        }
        $this->setProp('class', 'block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm');
        if(method_exists($this, 'getClass')){
            $this->setProp('class', $this->getClass());
        }
        
    }
    public static function make($label = null, $name=null)
    {
       return new static($label, $name);
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view(sprintf('tall::components.form.%s', $this->view()))->with($this->props);
    }

    public function setProp($prop, $value)
    {
        $this->props[$prop] = $value;

        return $this;
    }

    public function span($span)
    {
        $this->setProp('span', $span);

        return $this;
    }

    public function getProp($prop)
    {
        return $this->props[$prop];
    }

    
    public function setProps($props)
    {
        foreach($props as $name => $value){

            $this->setProp($name, $value);

        }

        return $this;
    }

    public function order($order)
    { 
        $this->setProp('order', $order);

        return $this;
    }
    
    public function type()
    {
        return "text";
    }

    public function __get($name)
    {
        return data_get($this->props, $name);
    }
}
