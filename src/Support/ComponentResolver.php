<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Support;

class ComponentResolver {

    public function resolve(string $name): string
    {
        $components = config('tall.components');

        return $components[$name]['alias'];
    }

    public function resolveClass(string $name): string
    {
        $components = config('tall.components');

        return $components[$name]['class'];
    }
}
