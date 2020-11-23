<?php

namespace Twigger\Blade\Themes\Materialize\Components\Grid;

class Col extends \Twigger\Blade\Schema\Grid\Col
{

    /**
     * Get the view / view contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\Support\Htmlable|\Closure|string
     */
    public function render()
    {
        return view('materialize-theme::grid.col');
    }
}
