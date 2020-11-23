<?php

namespace Twigger\Blade\Themes\Materialize\Components;

use Twigger\Blade\Docs\DocTip;
use Twigger\Blade\Schema\Button as ButtonSchema;

/**
 * @DocTip(tip="This is a material specific tip")
 */
class Button extends ButtonSchema
{

    public function colour()
    {
        switch($this->type) {
            case 'success':
                return 'green accent-4';
            case 'danger':
                return 'red';
            case 'info':
                return 'light-blue accent-2';
            default:
                return '';
        }
    }

    public function render()
    {
        return view('materialize-theme::button');
    }
}
