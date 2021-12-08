<?php

namespace App\View\Components\Visitors;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $caption;
    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($caption = null, $title)
    {
        $this->caption = $caption;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.visitors.breadcrumb');
    }
}
