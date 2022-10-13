<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Tall\Http\Livewire\Traits;

use Illuminate\Support\Facades\Validator;


trait FollowsRules
{
    public function rulesArray($group, $realtime = false)
    {
        $rules = [];
        $rules_ignore = $realtime ? $this->rulesIgnoreRealtime() : [];

        foreach ($this->getRules() as $field => $rule) {
           
            if ($rule) {
                $rules[sprintf('%s.%s',$group, $field)] = $this->fieldRules($rule, $rules_ignore);
            }
        }

        return $rules;
    }

    public function validate($rules = null, $messages = [], $attributes = [])
    {
        $rules = $this->rulesArray('data');
      
        return parent::validate($rules);
    }

    public function validateCategory($rules = null, $messages = [], $attributes = [])
    {
        $rules = $this->rulesArray('category');       
      
        return parent::validate($rules);
    }


    public function fieldRules($rules, $rules_ignore)
    {
        $field_rules = is_array($rules) ? $rules : explode('|', $rules);

        if ($rules_ignore) {
            $field_rules = array_udiff($field_rules, $rules_ignore, function ($a, $b) {
                return $a != $b;
            });
        }

        return $field_rules;
    }

    public function rulesIgnoreRealtime()
    {
        return [];
    }
}
