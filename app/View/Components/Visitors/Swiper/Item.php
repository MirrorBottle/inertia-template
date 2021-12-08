<?php

namespace App\View\Components\Visitors\Swiper;

use Illuminate\View\Component;

class Item extends Component
{
    public $small;
    public $title;
    public $caption;
    public $img;
    public $href;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $title,
        $caption,
        $img,
        $small = 'GKII Kota Balikpapan',
        $href = '#'
    ) {
        $this->title = $title;
        $this->caption = $caption;
        $this->img = $img;
        $this->small = $small;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.visitors.swiper.item');
    }
}
