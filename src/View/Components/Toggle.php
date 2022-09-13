<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\View\Components;

use Illuminate\Support\{Str, Stringable};

class Toggle extends Checkbox
{
    protected function getView(): string
    {
        return 'tall::components.toggle';
    }

    public function backgroundClasses(bool $hasError): string
    {
        $size = $this->classes([
            'h-4 w-7'  => $this->sm,
            'h-5 w-9'  => $this->md,
            'h-6 w-10' => $this->lg,
        ]);

        return Str::of("
            block rounded-full cursor-pointer transition ease-in-out duration-100
            peer-focus:ring-2 peer-focus:ring-offset-2 {$size}
            group-focus:ring-2 group-focus:ring-offset-2
        ")->unless(
            $hasError,
            function (Stringable $stringable) {
                return $stringable->append('
                    bg-gray-200 peer-checked:bg-indigo-600 peer-focus:ring-indigo-600
                    group-focus:ring-indigo-600 dark:group-focus:ring-gray-600
                    dark:peer-focus:ring-gray-600 dark:peer-focus:ring-offset-gray-800
                    dark:bg-gray-600 dark:peer-checked:bg-gray-700
                ');
            },
            function (Stringable $stringable) {
                return $stringable->append('
                    bg-red-600 peer-focus:ring-red-600 dark:bg-red-700
                    group-focus:ring-red-600 dark:group-focus:ring-red-700
                    dark:peer-focus:ring-red-700 dark:peer-focus:ring-offset-gray-800
                ');
            }
        );
    }

    public function circleClasses(): string
    {
        $classes = $this->classes([
            'checked:translate-x-3 w-3 h-3'                => $this->sm,
            'checked:translate-x-3.5 left-0.5 w-3.5 h-3.5' => $this->md,
            'checked:translate-x-4 left-0.5 w-4 h-4'       => $this->lg,
        ]);

        return "
            absolute mx-0.5 my-auto inset-y-0 {$classes} rounded-full border-0 appearance-none
            translate-x-0 transform transition ease-in-out duration-200 cursor-pointer shadow
            checked:bg-none peer focus:ring-0 focus:ring-offset-0 focus:outline-none bg-white
            checked:text-white dark:bg-gray-200
        ";
    }
}
