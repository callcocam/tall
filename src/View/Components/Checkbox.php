<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\View\Components;

use Illuminate\Support\{Str, Stringable};

class Checkbox extends FormComponent
{
    public bool $sm;

    public bool $md;

    public bool $lg;

    public ?string $label;

    public ?string $leftLabel;

    public ?string $description;

    public function __construct(
        bool $md = false,
        bool $lg = false,
        ?string $label = null,
        ?string $leftLabel = null,
        ?string $description = null
    ) {
        $this->sm           = !$md && !$lg;
        $this->md           = $md;
        $this->lg           = $lg;
        $this->label        = $label;
        $this->leftLabel    = $leftLabel;
        $this->description  = $description;
    }

    protected function getView(): string
    {
        return 'tall::components.checkbox';
    }

    public function getClasses(bool $hasError): string
    {
        return Str::of("form-checkbox rounded transition ease-in-out duration-100 {$this->size()}")->unless(
            $hasError,
            function (Stringable $stringable) {
                return $stringable->append('
                    border-gray-300 text-indigo-600 focus:ring-indigo-600 focus:border-indigo-400
                    dark:border-gray-500 dark:checked:border-gray-600 dark:focus:ring-gray-600
                    dark:focus:border-gray-500 dark:bg-gray-600 dark:text-gray-600
                    dark:focus:ring-offset-gray-800
                ');
            },
            function (Stringable $stringable) {
                return $stringable->append('
                    focus:ring-red-500 ring-red-500 border-red-400 text-red-600
                    focus:border-red-400 dark:focus:border-red-600 dark:ring-red-600
                    dark:border-red-600 dark:bg-red-700 dark:checked:bg-red-700
                    dark:focus:ring-offset-gray-800 dark:checked:border-red-700
                ');
            },
        );
    }

    private function size(): string
    {
        return $this->classes([
            'w-5 h-5' => $this->md,
            'w-6 h-6' => $this->lg,
        ]);
    }
}