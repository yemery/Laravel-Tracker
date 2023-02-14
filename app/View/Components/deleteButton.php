<?php

namespace App\View\Components;

use Illuminate\View\Component;

class deleteButton extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $route, public $object)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.delete-button');
    }
}
