<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\View\Components;

use Illuminate\View\ComponentAttributeBag;

abstract class FormComponent extends Component
{
    public function render()
    {
        return function (array $data) {
            return view($this->getView(), $this->mergeAttributes($data))->render();
        };
    }

    abstract protected function getView(): string;

    protected function sharedAttributes(): array
    {
        return ['id', 'name', 'disabled', 'readonly'];
    }

    protected function mergeAttributes(array $data): array
    {
        /** @var ComponentAttributeBag $attributes */
        $attributes = $data['attributes'];

        /** @var string|null $model */
        $model = $attributes->wire('model')->value();

        if (!$attributes->has('name') && $model) {
            $attributes->offsetSet('name', $model);
        }

        if (!$attributes->has('id') && $model) {
            $attributes->offsetSet('id', md5($model));
        }

        foreach ($this->sharedAttributes() as $attribute) {
            $value = property_exists($this, $attribute)
                ? data_get($this, $attribute)
                : $attributes->get($attribute);

            $data[$attribute] = $value;
            $attributes->offsetSet($attribute, $value);
        }

        return $data;
    }
}
