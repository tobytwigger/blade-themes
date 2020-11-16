<?php

namespace Twigger\Blade\Themes\Bootstrap\Components;

use Twigger\Blade\Schema\Button as ButtonSchema;

class Button extends ButtonSchema
{

    public function render()
    {
        return view('bootstrap-theme::button');
    }
}
