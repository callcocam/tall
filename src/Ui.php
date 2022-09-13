<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall;

use Tall\Support\{BladeDirectives, ComponentResolver};

class Ui
{
    public function component(string $name): string
    {
        return (new static)->components()->resolve($name);
    }

    public function components(): ComponentResolver
    {
        return new ComponentResolver();
    }

    public function directives(): BladeDirectives
    {
        return new BladeDirectives();
    }
}
