<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Layout extends Component
{
    public $menu;

    public function __construct($menu = null)
    {
        $this->menu = $menu;
    }

    public function render()
    {
        return view('components.layout');
    }
}
