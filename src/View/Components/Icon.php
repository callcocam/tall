<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\View\Components;

use Illuminate\View\Component;

class Icon extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $name,
        public ?string $style = null,
        public bool $solid = false,
        public bool $outline = false,
    ) {
        $this->style = $this->getStyle();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('tall::components.tall.icon');
    }

    private function getStyle(): string
    {
        if ($this->style) {
            return $this->style;
        }

        if ($this->solid) {
            return 'solid';
        }

        if ($this->outline) {
            return 'outline';
        }

        return config('icons.style','solid');
    }
}
