<?php

namespace App\View\Components\Visitors;

use Illuminate\View\Component;

class Menu extends Component
{
    public $title;
    public $href;
    public $childs;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $title = 'Home',
        $href = '#',
        $childs = null
    )
    {
        $this->title = $title;
        $this->href = $href;
        $this->childs = $childs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.visitors.menu');
    }
}
