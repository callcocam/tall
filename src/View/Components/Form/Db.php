<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\View\Components\Form;

use App\Models\Input;
use Tall\View\Components\Form\Traits\WithOptions;
use Illuminate\Support\Str;


class Db extends Field
{
   use WithOptions;

    public function db($name)
    {
        $input = Input::query()->where('slug', Str::slug($name))->first();
        if($input){
            $this->setProp('view', $input->template);
            if($options = $input->options()->pluck('description', 'name')->toArray()){
                if($model = data_get($options, 'db')){
                    $this->pluck($model);
                }
            }

            if($attributes = $input->attributes()->pluck('description', 'name')->toArray()){
               
                foreach($attributes as $key => $name){
                    $this->setProp(trim($key), trim($name));
                }
            }

            if(!in_array($input->type, [
                'db',
                'textarea',
                'select'
            ])){
                $this->setProp("type", trim($input->type));
            }
        }

        return $this;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return string
     */
    public function view()
    {
        return data_get($this->props, 'view');
    }

    public function type()
    {
        return data_get($this->props, 'view');
    }
}
