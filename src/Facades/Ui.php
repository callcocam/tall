<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Facades;

use Illuminate\Support\Facades\Facade;
use Tall\Support\{BladeDirectives, ComponentResolver};

/**
 * @method static string component(string $name)
 * @method static ComponentResolver components()
 * @method static BladeDirectives directives()
 */
class Ui extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Tall\Ui::class;
    }
}
