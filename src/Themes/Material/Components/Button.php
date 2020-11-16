<?php

namespace Twigger\Blade\Themes\Material\Components;

use Twigger\Blade\Docs\DocName;
use Twigger\Blade\Schema\Button as ButtonSchema;

class Button extends ButtonSchema
{

    public function render()
    {
        return view('material-theme::button');
    }
}
