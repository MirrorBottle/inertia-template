<?php

namespace App\View\Components\Visitors\Forms;

use Illuminate\View\Component;

class Input extends Component
{
    public $id;
    public $label;
    public $type;
    public $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $id,
        $label,
        $name,
        $type = 'text'
    ) {
        $this->id = $id;
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.visitors.forms.input');
    }
}
