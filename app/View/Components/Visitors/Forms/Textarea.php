<?php

namespace App\View\Components\Visitors\Forms;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $name;
    public $id;
    public $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $id, $label)
    {
        $this->name = $name;
        $this->id = $id;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.visitors.forms.textarea');
    }
}
