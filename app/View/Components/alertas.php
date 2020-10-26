<?php

namespace App\View\Components;

use Illuminate\View\Component;

class alertas extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $confirmation;
    public function __construct($confirmation )
    {
        $this->confirmation    = $confirmation;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.alertas');
    }
}
