<?php

namespace Twigger\Blade\Themes\Material\Components;

use Twigger\Blade\Docs\DocName;
use Twigger\Blade\Docs\DocTip;
use Twigger\Blade\Schema\Button as ButtonSchema;

/**
 * @DocTip(tip="This is a material specific tip")
 */
class Button extends ButtonSchema
{

    public function render()
    {
        return view('material-theme::button');
    }
}
