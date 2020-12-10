<?php

namespace Twigger\Blade\Themes\Bootstrap;

use Twigger\Blade\Foundation\ThemeDefinition;
use Twigger\Blade\Themes\Bootstrap\Components\Button;
use Twigger\Blade\Themes\Bootstrap\Components\Select;

class BootstrapTheme extends ThemeDefinition
{

    public function name(): string
    {
        return 'Bootstrap';
    }

    public function button(): string
    {
        return Button::class;
    }

    public function select(): string
    {
        return Select::class;
    }

    public function styles(): array
    {
        return [
            '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">',
            sprintf('<link rel="stylesheet" href="%s">', asset('vendor/themes/bootstrap/customisation.css')),
        ];
    }

    public function scripts(): array
    {
        return [
            '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>'
        ];
    }

}
