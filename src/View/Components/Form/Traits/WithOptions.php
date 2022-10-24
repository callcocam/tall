<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/

namespace Tall\View\Components\Form\Traits;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

trait WithOptions 
{
    
    
    
     /**
     * selected.
     *
     * @return $this
     */
    public function selected($selected, $name = null)
    {
        if(empty($name)){
            $name=$this->name;
        }
        $this->setProp('selected',$selected);
        $this->setProp('selectedName',$name);

        return $this;
    }
    
     /**
     * modelName.
     *
     * @return $this
     */
    public function modelName($modelName)
    {
        $this->setProp('modelName',$modelName);
        
        return $this;
    }

    public function filters($filters)
    {
        $this->setProp('filters', $filters);

        return $this;
    }
    public function array($options)
    {
       
        $this->setProp('options', $options);

        return $this;       
    }
    
    public function options($options)
    {
       
        if(Arr::isAssoc($options)){
            $this->setProp('options', array_flip($options));
        }
        else{
            $this->setProp('options', $options);
        }

        return $this;       
    }

    public function select($model, $name= "name", $fields = ['*'])
    {
        if(is_string($model)){
            $builder  = app($model)->query();            
        }
        elseif($model instanceof \Illuminate\Database\Eloquent\Builder){
            $builder  = $model;
        }
        $selected = data_get($this->props, 'selected');
        
        if( $options = $this->queryBuilder($builder,$selected)->limit(10)->select($fields)->get()){  
            $options->map(function($model) use($selected, $name){
                if($model->id == $selected){
                    data_set($this->props, 'selectedLabel', $name);
                }
            });          
            $this->setProp('options',$options->toArray());
        }
        return $this;
    }

    
    public function pluck($model, $name="name", $key="id")
    {
        data_set($this->props, 'selectedLabel', "");
        if(is_string($model)){
            $builder  = app($model)->query();            
        }
        elseif($model instanceof \Illuminate\Database\Eloquent\Builder){
            $builder  = $model;
        }
        $selected = data_get($this->props, 'selected'); 
        $selectedFilter =[];
        if(!is_array($selected)){
            if($selected){
                $builderSelected =clone $builder; 
                if($model =  $builderSelected->where($key,$selected)->first()){
                    data_set($this->props, 'selectedLabel', $model[$name]);
                }
            }
            $selectedFilter =[ $selected ];
        }
        else{
            $builderSelected =clone $builder; 
            $selectedFilter =  $builderSelected->orWhereIn('id',array_filter($selected))->pluck($name, $key)->toArray();
        }
        $multiple = data_get($this->props, 'multiple', false); 
       
        if( $options = $this->queryBuilder($builder,$selectedFilter)->limit(200)->pluck($name, $key)){  
            if($multiple){
                data_set($this->props, 'selectedLabel', sprintf("Items selecionado(s) - %s", collect($selectedFilter)->count()));
                $this->setProp('selected',$selectedFilter);
                $this->setProp('options',$options->toArray());
            }
            else{
                $this->setProp('options',array_flip($options->toArray()));
            }                 
        }
       
        return $this;
    }

    private function queryBuilder($builder,$selected)
    {
        
        $modelName = data_get($this->props, 'modelName');             
        $search = data_get($this->props, sprintf('filters.%s', $this->name));       
        return $builder->when($search ,function (Builder $query) use($search,$selected){
            if($search){
              return $query->where('name', 'like', "%{$search}%");
            }
            else{
                return $query->when($selected,function (Builder $query) use($selected){
                    if(count($selected)){
                        return $query->orWhereNotIn('id',array_flip($selected));
                    }
                    return $query;
                });
            }
        });
    }
}
