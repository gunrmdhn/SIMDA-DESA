<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $title;
    public $button;

    public function __construct($title = null, $button = null)
    {
        $this->title = $title;
        $this->button = $button;
    }

    public function render()
    {
        return view('components.card');
    }
}
