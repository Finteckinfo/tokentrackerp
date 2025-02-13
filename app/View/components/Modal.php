<?php


namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $title;
    public $subtitle;
    public $action;

    public function __construct($title, $subtitle, $action)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->action = $action;
    }

    public function render()
    {
        return view('dashboard.components.timesheetmodal');
    }
}
