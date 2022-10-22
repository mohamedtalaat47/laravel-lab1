<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $color;
    public $content;
    public $href;
    public $attr;


    public function __construct($color,$content,$href = "#",$attr = "")
    {
        $this->color = $color;
        $this->content = $content;
        $this->href = $href;
        $this->attr = $attr;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}
