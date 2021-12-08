<?php

namespace App\View\Components\Visitors;

use Illuminate\View\Component;

class Location extends Component
{
    public $href;
    public $name;
    public $address;
    public $slug;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $address,
        $name,
        $href,
        $slug
    ) {
        $this->address = $address;
        $this->name = $name;
        $this->href = $href;
        $this->slug = $slug;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.visitors.location');
    }
}
