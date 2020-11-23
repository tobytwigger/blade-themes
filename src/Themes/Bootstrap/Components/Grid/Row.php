<?php

namespace Twigger\Blade\Themes\Bootstrap\Components\Grid;

class Row extends \Twigger\Blade\Schema\Grid\Row
{

    /**
     * Get the view / view contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\Support\Htmlable|\Closure|string
     */
    public function render()
    {
        return view('bootstrap-theme::grid.row');
    }
}
