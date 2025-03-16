<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SeesionMsg extends Component
{
    public $message;
    public $message_color;
    public function __construct($message,$color)
    {
        $this->message=$message;
        $this->message_color=$color;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.seesion-msg');
    }
}
