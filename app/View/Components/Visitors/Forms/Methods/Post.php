<?php

namespace App\View\Components\Visitors\Forms\Methods;

use Illuminate\View\Component;

class Post extends Component
{
    public $action;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action = null)
    {
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.visitors.forms.methods.post');
    }
}
