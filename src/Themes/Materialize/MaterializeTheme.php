<?php

namespace Twigger\Blade\Themes\Materialize;

use Twigger\Blade\Foundation\ThemeDefinition;
use Twigger\Blade\Themes\Materialize\Components\Button;
use Twigger\Blade\Themes\Materialize\Components\Select;

class MaterializeTheme extends ThemeDefinition
{

    public function name(): string
    {
        return 'Materialize';
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
            '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">',
        ];
    }

    public function scripts(): array
    {
        return [
            '<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>'
        ];
    }
}
